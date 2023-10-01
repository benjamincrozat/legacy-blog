<?php

namespace App\Providers;

use App\Models\Category;
use App\Actions\Subscribe;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\PostCacheRepository;
use Algolia\AlgoliaSearch\RecommendClient;
use App\Repositories\CategoryCacheRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $this->app->bind(CategoryRepository::class, fn () => new CategoryRepository);

        $this->app->bind(CategoryCacheRepository::class, CategoryCacheRepository::class);

        $this->app->bind(PostRepository::class, PostRepository::class);

        $this->app->bind(PostCacheRepository::class, PostCacheRepository::class);

        $this->app->bind(RecommendClient::class, function (Application $app) {
            return RecommendClient::create(
                $app['config']->get('scout.algolia.id'),
                $app['config']->get('scout.algolia.secret')
            );
        });

        $this->app->bind(Subscribe::class, fn () => new Subscribe);
    }

    public function boot() : void
    {
        Model::preventAccessingMissingAttributes(! app()->isProduction());

        Model::unguard();

        // This categories variable I pass in this view composer is also used in the blog's navigation.
        View::composer(['components.navigation', 'home'], function ($view) {
            static $categories;

            // If the static variable declared above has already been set, use it. Otherwise, set it.
            // This prevents the query from being run multiple times on the same request.
            $categories ??= cache()->rememberForever('categories', function () {
                return Category::query()
                    ->whereHas('posts')
                    ->orderBy('is_highlighted', 'desc')
                    ->orderBy('name')
                    ->get();
            });

            $view->with(compact('categories'));
        });

        Vite::useScriptTagAttributes([
            'defer' => true,
        ]);
    }
}
