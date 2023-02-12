<?php

namespace App\Models;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Support\TableOfContentsGenerator;
use Illuminate\Database\Eloquent\Builder;
use Algolia\AlgoliaSearch\RecommendClient;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Algolia\AlgoliaSearch\Exceptions\NotFoundException;
use Algolia\AlgoliaSearch\Exceptions\UnreachableException;

class Post extends BaseModel implements Feedable
{
    use HasFactory;
    use Searchable;

    protected $casts = [
        'modified_at' => 'date',
    ];

    public static function booted() : void
    {
        static::saved(function (Post $post) {
            if ($post->wasChanged('slug')) {
                Redirect::create([
                    'from' => $post->getOriginal('slug'),
                    'to' => $post->slug,
                ]);
            }
        });
    }

    public function scopeWithRecommendations(Builder $query, Collection $recommendations, int $excluding)
    {
        $query
            ->when($recommendations->isNotEmpty(), function (Builder $query) use ($recommendations) {
                $query
                    ->whereIn('id', $recommendations)
                    ->orderByRaw(
                        DB::raw('FIELD(id, ' . $recommendations->join(',') . ')')
                    );
            }, function (Builder $query) use ($excluding) {
                $query
                    ->inRandomOrder()
                    ->whereNotIn('id', [$excluding]);
            });
    }

    public function scopeWithUser(Builder $query) : void
    {
        $query
            ->addSelect([
                'user_name' => User::select('name')
                    ->whereColumn('id', 'posts.user_id')
                    ->limit(1),
            ])
            ->addSelect([
                'user_email' => User::select('email')
                    ->whereColumn('id', 'posts.user_id')
                    ->limit(1),
            ]);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bestProducts() : HasMany
    {
        return $this->hasMany(BestProduct::class)->orderBy('position');
    }

    public function pins() : HasMany
    {
        return $this->hasMany(Pin::class);
    }

    public function readTime() : Attribute
    {
        return Attribute::make(function () {
            $words = str_word_count(strip_tags($this->content));
            $minutes = ceil($words / 200);

            return 0 === $minutes ? 1 : $minutes;
        });
    }

    public function tableOfContents() : Attribute
    {
        return Attribute::make(
            fn () => TableOfContentsGenerator::generate($this->introduction . $this->content)
        );
    }

    public function renderedIntroduction() : Attribute
    {
        return Attribute::make(
            fn () => Str::marxdown($this->introduction ?? '')
        )->shouldCache();
    }

    public function renderedContent() : Attribute
    {
        return Attribute::make(
            fn () => Str::marxdown($this->content ?? '')
        )->shouldCache();
    }

    public function recommendations() : Collection
    {
        try {
            $recommendClient = RecommendClient::create(
                config('scout.algolia.id'),
                config('scout.algolia.secret')
            );

            $recommendations = $recommendClient->getRelatedProducts([[
                'indexName' => config('app.env') . '_posts',
                'objectID' => "$this->id",
                'maxRecommendations' => 10,
                'queryParameters' => [
                    'filters' => ! $this->ai ? 'ai:false' : 'ai:true',
                ],
            ]]);

            return collect($recommendations['results'][0]['hits'])->pluck('objectID');
        } catch (NotFoundException|UnreachableException $e) {
            return collect();
        }
    }

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        $query = parent::resolveRouteBindingQuery($query, $value, $field);

        return $query->withUser();
    }

    public function toSearchableArray() : array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'introduction' => $this->rendered_introduction,
            'content' => strip_tags($this->rendered_content),
            'description' => $this->description,
            'image' => $this->image,
            'ai' => $this->ai,
        ];
    }

    public static function getFeedItems() : Collection
    {
        return self::query()
            ->where('ai', false)
            ->latest()
            ->withUser()
            ->get();
    }

    public function toFeedItem() : FeedItem
    {
        return FeedItem::create([
            'id' => route('posts.show', $this),
            'title' => $this->title,
            'summary' => Str::marxdown($this->content),
            'updated' => $this->modified_at ?? $this->created_at,
            'link' => route('posts.show', $this),
            'authorName' => $this->user_name,
        ]);
    }
}
