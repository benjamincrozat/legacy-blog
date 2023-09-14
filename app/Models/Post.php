<?php

namespace App\Models;

use Spatie\Feed\Feedable;
use Laravel\Scout\Searchable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use App\Models\Concerns\HasFeedItems;
use App\Models\Concerns\LogsActivity;
use App\Models\Concerns\HasLocalScopes;
use App\Models\Presenters\PostPresenter;
use App\Models\Concerns\HasRelationships;
use App\Models\Concerns\HasRecommendations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends BaseModel implements Feedable, HasMedia
{
    use HasFeedItems, HasLocalScopes, HasRecommendations, HasRelationships, InteractsWithMedia, LogsActivity, Searchable;

    protected $casts = [
        'published_at' => 'datetime',
        'manually_updated_at' => 'date',
    ];

    public function presenter() : PostPresenter
    {
        return new PostPresenter($this);
    }

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        $query = parent::resolveRouteBindingQuery($query, $value, $field);

        return $query
            ->with('categories')
            ->unless(
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
            'description' => $this->description,
            'teaser' => $this->teaser,
            'community_link' => $this->community_link,
            'categories' => $this->categories->pluck('name')->toArray(),
        ];
    }

    public function registerMediaCollections() : void
    {
        $this
            ->addMediaCollection('image')
            ->singleFile();

        $this->addMediaCollection('images');
    }

    public function registerMediaConversions(Media $media = null) : void
    {
        $this
            ->addMediaConversion('optimized')
            ->fit(Manipulations::FIT_CONTAIN, 1500, 1500);

        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300);
    }
}
