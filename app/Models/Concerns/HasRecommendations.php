<?php

namespace App\Models\Concerns;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Facades\Algolia\AlgoliaSearch\RecommendClient;

trait HasRecommendations
{
    public function recommendations() : Attribute
    {
        return Attribute::make(function () {
            try {
                $recommendations = RecommendClient::getRelatedProducts([[
                    'indexName' => config('scout.prefix') . 'posts',
                    'objectID' => "$this->id",
                    'maxRecommendations' => 11,
                ]]);

                // We return the posts in the order Algolia recommends.
                return static::with('categories', 'media')->published()->asSequence(
                    Arr::pluck($recommendations['results'][0]['hits'], 'objectID')
                )->get();
            } catch (Exception $e) {
                // Whenever the API throws an error, we silently report it.
                report($e);

                // But we always return a random set of posts, which is better than nothing.
                return static::query()
                    ->with('categories', 'media')
                    ->published()
                    ->inRandomOrder()
                    ->whereNotIn('id', [$this->id])
                    ->limit(11)
                    ->get();
            }
        })->shouldCache();
    }
}
