<?php

namespace App\Models;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Support\Arr;
use Laravel\Scout\Searchable;
use App\Support\TreeGenerator;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Algolia\AlgoliaSearch\RecommendClient;
use Illuminate\View\ComponentAttributeBag;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Algolia\AlgoliaSearch\Exceptions\NotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Algolia\AlgoliaSearch\Exceptions\UnreachableException;

class Post extends BaseModel implements Feedable
{
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

    public function scopeAsSequence(Builder $query, $sequence) : void
    {
        $sequence = collect($sequence);

        $query
            ->whereIn('id', $sequence)
            ->orderByRaw('FIELD(id, ' . $sequence->join(',') . ')');
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

    public function affiliates() : BelongsToMany
    {
        return $this->belongsToMany(Affiliate::class)
            ->withPivot('position', 'highlight', 'highlight_title', 'highlight_text')
            ->orderByPivot('position');
    }

    public function pins() : HasMany
    {
        return $this->hasMany(Pin::class);
    }

    public function tree() : Attribute
    {
        return Attribute::make(
            fn () => TreeGenerator::generate(
                view('posts.components.post', [
                    'barebones' => true,
                    'attributes' => new ComponentAttributeBag,
                    'highlights' => collect(),
                    'post' => $this,
                ])->render()
            )
        )->shouldCache();
    }

    public function renderedIntroduction() : Attribute
    {
        return Attribute::make(
            fn () => str($this->introduction ?? '')->marxdown()
        )->shouldCache();
    }

    public function renderedContent() : Attribute
    {
        return Attribute::make(fn () => str($this->content ?? '')->marxdown())->shouldCache();
    }

    public function renderedConclusion() : Attribute
    {
        return Attribute::make(
            fn () => str($this->conclusion ?? '')->marxdown()
        )->shouldCache();
    }

    public function renderedTeaser() : Attribute
    {
        return Attribute::make(
            fn () => str($this->teaser ?? '')->marxdown()
        )->shouldCache();
    }

    public function recommendations() : Attribute
    {
        return Attribute::make(function () {
            try {
                if (! config('scout.algolia.id') || ! config('scout.algolia.secret')) {
                    return [];
                }

                $recommendClient = RecommendClient::create(
                    config('scout.algolia.id'),
                    config('scout.algolia.secret')
                );

                $recommendations = $recommendClient->getRelatedProducts([[
                    'indexName' => config('app.env') . '_posts',
                    'objectID' => "$this->id",
                    'maxRecommendations' => 10,
                ]]);

                return Arr::pluck($recommendations['results'][0]['hits'], 'objectID');
            } catch (NotFoundException|UnreachableException $e) {
                return [];
            }
        })->shouldCache();
    }

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        $query = parent::resolveRouteBindingQuery($query, $value, $field);

        return $query->withUser()->with('affiliates');
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
        ];
    }

    public static function getFeedItems() : Collection
    {
        return self::query()
            ->latest()
            ->withUser()
            ->get();
    }

    public function toFeedItem() : FeedItem
    {
        return FeedItem::create([
            'id' => route('posts.show', $this),
            'title' => $this->title,
            'summary' => $this->teaser ?? $this->description,
            'updated' => $this->created_at,
            'authorName' => $this->user_name,
        ]);
    }
}
