<?php

namespace App\Models;

use Spatie\Feed\Feedable;
use App\Models\Concerns\HasFeedItems;
use App\Models\Concerns\HasPresenter;
use App\Models\Concerns\HasLocalScopes;
use App\Models\Concerns\HasRelationships;
use App\Models\Concerns\HasRecommendations;

class Post extends BaseModel implements Feedable
{
    use HasFeedItems, HasLocalScopes, HasPresenter, HasRecommendations, HasRelationships;

    protected $casts = [
        'modified_at' => 'date',
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

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        $query = parent::resolveRouteBindingQuery($query, $value, $field);

        return $query->withUser();
    }
}
