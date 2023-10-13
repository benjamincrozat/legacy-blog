<?php

namespace App\Models\Concerns;

use Spatie\Feed\FeedItem;
use Illuminate\Support\Collection;

trait HasFeedItems
{
    public static function getFeedItems() : Collection
    {
        return self::published()
            ->orderByDesc('published_at')
            ->limit(9)
            ->get();
    }

    public function toFeedItem() : FeedItem
    {
        return FeedItem::create([
            'id' => route('posts.show', $this->slug),
            'title' => $this->title,
            'summary' => view('feed-item', ['post' => $this])->render(),
            'updated' => $this->published_at,
            'link' => route('posts.show', [
                'slug' => $this->slug,
                'utm_source' => 'feed',
            ]),
            'authorName' => $this->user->name,
        ]);
    }
}
