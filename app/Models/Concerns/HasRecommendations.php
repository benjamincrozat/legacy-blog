<?php

namespace App\Models\Concerns;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Facades\Algolia\AlgoliaSearch\RecommendClient;

trait HasRecommendations
{
    public function recommendations() : Attribute
    {
        return Attribute::make(function () {
            $recommendations = RecommendClient::getRelatedProducts([[
                'indexName' => config('scout.prefix') . 'posts',
                'objectID' => "$this->id",
                'maxRecommendations' => 11,
            ]]);

            return Arr::pluck($recommendations['results'][0]['hits'], 'objectID');
        })->shouldCache();
    }
}
