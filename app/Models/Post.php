<?php

namespace App\Models;

use Spatie\Feed\Feedable;
use Laravel\Scout\Searchable;
use App\Models\Concerns\HasFeedItems;
use App\Models\Concerns\HasLocalScopes;
use App\Models\Presenters\PostPresenter;
use App\Jobs\CacheRenderedPostAttributes;
use App\Models\Concerns\HasRelationships;
use App\Models\Concerns\HasRecommendations;

class Post extends BaseModel implements Feedable
{
    use HasFeedItems, HasLocalScopes, HasRecommendations, HasRelationships, Searchable;

    protected $casts = [
        'manually_updated_at' => 'date',
    ];

    public static function booted() : void
    {
        static::saved(
            fn (self $model) => CacheRenderedPostAttributes::dispatchAfterResponse($model)
        );
    }

    public function presenter() : PostPresenter
    {
        return new PostPresenter($this);
    }

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        $query = parent::resolveRouteBindingQuery($query, $value, $field);

        return $query->unless(
            request()->routeIs('filament.*') || 1 === auth()->id(),
            fn ($query) => $query->published(),
        );
    }

    public function toSearchableArray() : array
    {
        return [
            'id' => $this->id,
            'user_name' => $this->user->name,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'description' => $this->content,
            'teaser' => $this->content,
            'community_link' => $this->community_link,
            'categories' => $this->categories->pluck('name')->toArray(),
        ];
    }
}
