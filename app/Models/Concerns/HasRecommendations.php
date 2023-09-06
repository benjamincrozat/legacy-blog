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
                if ('algolia' !== config('scout.driver')) {
                    throw new Exception("Scout's driver is not configured.");
                }

                $recommendations = RecommendClient::getRelatedProducts([[
                    'indexName' => config('scout.prefix') . 'posts',
                    'objectID' => "$this->id",
                    'maxRecommendations' => 10,
                ]]);

                // We return the posts in the order Algolia recommends.
                return static::with('categories')->asSequence(
                    Arr::pluck($recommendations['results'][0]['hits'], 'objectID')
                )->get();
            } catch (Exception $e) {
                // Whenever the API throws an error, we silently report it.
                report($e);
            } finally {
                // But we always return a random set of posts, which is better than nothing.
                return static::query()
                    ->with('categories')
                    ->inRandomOrder()
                    ->whereNotIn('id', [$this->id])
                    ->limit(10)
                    ->get();
            }
        })->shouldCache();
    }
}
