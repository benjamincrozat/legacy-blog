<?php

namespace App\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Algolia\AlgoliaSearch\RecommendClient;

class AlgoliaServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $this->app->bind(RecommendClient::class, fn (Application $app) => RecommendClient::create(
            $app['config']->get('scout.algolia.id'),
            $app['config']->get('scout.algolia.secret')
        ));
    }
}
