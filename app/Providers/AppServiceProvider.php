<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Algolia\AlgoliaSearch\RecommendClient;

class AppServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $this->app->bind(RecommendClient::class, fn (Application $app) => RecommendClient::create(
            $app['config']->get('services.algolia.id'),
            $app['config']->get('services.algolia.secret')
        ));
    }

    public function boot() : void
    {
        Model::preventAccessingMissingAttributes(! app()->isProduction());

        Model::unguard();

        View::composer(['components.app', 'home'], function ($view) {
            static $categories;

            $view->with([
                'categories' => $categories ??= Category::with('latest')
                    ->whereHas('posts')
                    ->orderBy('name')
                    ->get(),
            ]);
        });
    }
}
