<?php

namespace App\Models\Concerns;

use Spatie\Feed\FeedItem;
use Illuminate\Support\Collection;

trait HasFeedItems
{
    public static function getFeedItems() : Collection
    {
        return self::query()
            ->latest()
            ->published()
            ->limit(10)
            ->get();
    }

    public function toFeedItem() : FeedItem
    {
        return FeedItem::create([
            'id' => route('posts.show', $this),
            'title' => $this->title,
            'summary' => view('feed-item', ['post' => $this])->render(),
            'updated' => $this->published_at,
            'link' => route('posts.show', [
                'post' => $this,
                'utm_source' => 'feed',
            ]),
            'authorName' => $this->user->name,
        ]);
    }
}
