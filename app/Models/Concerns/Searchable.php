<?php

namespace App\Models\Concerns;

use App\Presenters\PostPresenter;

trait Searchable
{
    use \Laravel\Scout\Searchable;

    public function presenter() : PostPresenter
    {
        return new PostPresenter($this);
    }

    public function toSearchableArray() : array
    {
        return [
            'id' => $this->id,
            'user_name' => $this->user->name,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'description' => $this->description,
            'teaser' => $this->teaser,
            'community_link' => $this->community_link,
            'categories' => $this->categories->pluck('name')->toArray(),
        ];
    }

    public function shouldBeSearchable() : bool
    {
        return ! is_null($this->published_at) && $this->published_at->lessThanOrEqualTo(now());
    }
}
