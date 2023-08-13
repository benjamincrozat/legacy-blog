<?php

namespace App\Models;

use Spatie\Feed\Feedable;
use App\Models\Concerns\HasFeedItems;
use App\Models\Concerns\HasLocalScopes;
use App\Models\Concerns\HasRelationships;
use App\Models\Concerns\HasRecommendations;
use App\Models\Concerns\PresentsPostAttributes;

class Post extends BaseModel implements Feedable
{
    use HasFeedItems, HasLocalScopes, HasRecommendations, HasRelationships, PresentsPostAttributes;

    protected $casts = [
        'modified_at' => 'date',
    ];

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        $query = parent::resolveRouteBindingQuery($query, $value, $field);

        return $query->withUser();
    }
}
