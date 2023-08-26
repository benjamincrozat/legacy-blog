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
            'summary' => $this->teaser ? $this->presenter()->teaser() : $this->description,
            'updated' => $this->created_at,
            'link' => route('posts.show', $this),
            'authorName' => $this->user_name ?? $this->user->name,
        ]);
    }
}
