<?php

namespace App\Models\Posts;

use App\Models\BaseModel;
use Spatie\Feed\Feedable;
use App\Support\TreeGenerator;
use Laravel\Nova\Actions\Actionable;
use Illuminate\View\ComponentAttributeBag;
use App\Models\Posts\Concerns\HasFeedItems;
use App\Models\Posts\Concerns\HasLocalScopes;
use App\Models\Posts\Concerns\CreatesRedirects;
use App\Models\Posts\Concerns\HasRelationships;
use App\Models\Posts\Concerns\HasRecommendations;
use App\Models\Posts\Concerns\PresentsAttributes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends BaseModel implements Feedable
{
    use Actionable, CreatesRedirects, HasFeedItems, HasLocalScopes, HasRecommendations, HasRelationships, PresentsAttributes;

    protected $casts = [
        'modified_at' => 'date',
    ];

    public function tree() : Attribute
    {
        return Attribute::make(
            fn () => TreeGenerator::generate(
                view('posts.components.post', [
                    'barebones' => true,
                    'attributes' => new ComponentAttributeBag,
                    'highlights' => collect(),
                    'post' => $this,
                ])->render()
            )
        )->shouldCache();
    }

    public function resolveRouteBindingQuery($query, $value, $field = null)
    {
        $query = parent::resolveRouteBindingQuery($query, $value, $field);

        return $query->withUser()->with('affiliates');
    }
}
