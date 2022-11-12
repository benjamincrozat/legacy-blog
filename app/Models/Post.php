<?php

namespace App\Models;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Support\Collection;
use App\Models\Traits\IsCategorizable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends BaseModel implements Feedable
{
    use HasFactory, IsCategorizable, Searchable;

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

    public function scopeFeatured(Builder $query) : void
    {
        $query->whereNotNull('image');
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

    public function features() : HasMany
    {
        return $this->hasMany(Feature::class)->orderBy('position');
    }

    public function highlights() : HasMany
    {
        return $this->hasMany(Highlight::class);
    }

    public function readTime() : Attribute
    {
        return Attribute::make(function () {
            $words = str_word_count(strip_tags($this->content));
            $minutes = ceil($words / 200);

            return 0 === $minutes ? 1 : $minutes;
        });
    }

    public function getTableOfContents() : Collection
    {
        preg_match_all('/(#{1,6}) (.*)/', $this->content, $headings);

        $tableOfContents = [];

        for ($i = 0; $i < count($headings[0]); ++$i) {
            $title = html_entity_decode(strip_tags(Str::marxdown($headings[2][$i])));

            $tableOfContents[] = [
                'id' => str($title)->slug(),
                'title' => $title,
                'level' => strlen($headings[1][$i]),
            ];
        }

        return collect($tableOfContents);
    }

    public function renderedIntroduction() : Attribute
    {
        return Attribute::make(
            fn () => Str::marxdown($this->introduction)
        )->shouldCache();
    }

    public function renderedContent() : Attribute
    {
        return Attribute::make(
            fn () => Str::marxdown($this->content)
        )->shouldCache();
    }

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        $query = parent::resolveRouteBindingQuery($query, $value, $field);

        return $query->withUser();
    }

    #[SearchUsingFullText(['title', 'content', 'description'])]
    public function toSearchableArray() : array
    {
        return $this->toArray();
    }

    public static function getFeedItems() : Collection
    {
        return self::latest()->withUser()->get();
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
