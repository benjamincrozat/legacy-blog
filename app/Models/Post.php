<?php

namespace App\Models;

use Spatie\Feed\Feedable;
use App\Models\Concerns\HasFeedItems;
use App\Models\Concerns\HasLocalScopes;
use App\Models\Presenters\PostPresenter;
use App\Models\Concerns\HasRelationships;
use App\Models\Concerns\HasRecommendations;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Post extends BaseModel implements Feedable
{
    use HasFeedItems, HasLocalScopes, HasRecommendations, HasRelationships;

    protected $casts = [
        'manually_updated_at' => 'date',
    ];

    public static function booted() : void
    {
        static::saved(function (self $model) {
            $pending = dispatch(function () use ($model) {
                $model->presenter()->content();
                $model->presenter()->teaser();
            });

            if (! app()->runningUnitTests()) {
                $pending->afterResponse();
            }
        });
    }

    public function presenter() : PostPresenter
    {
        return new PostPresenter($this);
    }

    public function scopePublished(Builder $query) : void
    {
        $query->where('is_published', true);
    }

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        $query = parent::resolveRouteBindingQuery($query, $value, $field);

        return $query->published()->withUser();
    }
}
