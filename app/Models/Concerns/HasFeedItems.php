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
            ->withUser()
            ->limit(10)
            ->get();
    }

    public function toFeedItem() : FeedItem
    {
        return FeedItem::create([
            'id' => route('posts.show', $this),
            'title' => $this->title,
            'summary' => view('feed-item', ['post' => $this])->render(),
            'updated' => $this->created_at,
            'link' => route('posts.show', [
                'post' => $this,
                'utm_source' => 'feed',
            ]),
            'authorName' => $this->user_name ?? $this->user->name,
        ]);
    }
}
