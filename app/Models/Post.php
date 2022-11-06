<?php

namespace App\Models;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends BaseModel implements Feedable
{
    use HasFactory;

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
            $level = strlen($headings[1][$i]);

            if ($level > 2 && ! $this->promotes_affiliate_links) {
                continue;
            }

            $title = html_entity_decode(strip_tags(Str::marxdown($headings[2][$i])));

            $tableOfContents[] = [
                'id' => str($title)->slug(),
                'title' => $title,
                'level' => $level,
            ];
        }

        return collect($tableOfContents);
    }

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        $query = parent::resolveRouteBindingQuery($query, $value, $field);

        return $query->withUser();
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
