<?php

namespace App\Models\Concerns;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Facades\Algolia\AlgoliaSearch\RecommendClient;
use Algolia\AlgoliaSearch\Exceptions\NotFoundException;
use Algolia\AlgoliaSearch\Exceptions\UnreachableException;

trait HasRecommendations
{
    public function recommendations() : Attribute
    {
        return Attribute::make(function () {
            try {
                if (! config('scout.algolia.id') || ! config('scout.algolia.secret')) {
                    return static::query()
                        ->inRandomOrder()
                        ->whereNotIn('id', [$this->id])
                        ->limit(10)
                        ->get();
                }

                $recommendations = RecommendClient::getRelatedProducts([[
                    'indexName' => config('app.env') . '_posts',
                    'objectID' => "$this->id",
                    'maxRecommendations' => 10,
                ]]);

                return static::asSequence(
                    Arr::pluck($recommendations['results'][0]['hits'], 'objectID')
                )->get();
            } catch (NotFoundException|UnreachableException $e) {
                return collect();
            }
        })->shouldCache();
    }
}
