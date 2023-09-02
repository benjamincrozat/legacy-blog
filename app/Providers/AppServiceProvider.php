<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Algolia\AlgoliaSearch\RecommendClient;
use League\CommonMark\Extension\Embed\EmbedExtension;
use Spatie\CommonMarkShikiHighlighter\HighlightCodeExtension;

class AppServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        // These are registered in the container because I swap
        // them up during testing to speed everything up.

        $this->app->bind(EmbedExtension::class, fn () => new EmbedExtension);
        $this->app->bind(HighlightCodeExtension::class, fn () => new HighlightCodeExtension('github-dark'));
        $this->app->bind(RecommendClient::class, fn (Application $app) => RecommendClient::create(
            $app['config']->get('scout.algolia.id'),
            $app['config']->get('scout.algolia.secret')
        ));

        // Telescope is useful for debugging, but it's not something
        // I want to run anywhere else than the local environment.
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    public function boot() : void
    {
        Model::preventAccessingMissingAttributes(! app()->isProduction());

        Model::unguard();

        // This categories variable I pass in this view composer is also used in the blog's navigation.
        View::composer(['components.navigation', 'home'], function ($view) {
            static $categories;

            $view->with([
                // If the static variable declared above has already been set, use it. Otherwise, set it.
                // This prevents the query from being run multiple times on the same request.
                'categories' => $categories ??= Category::with('latestPosts')
                    ->whereHas('posts')
                    ->orderBy('is_highlighted', 'desc')
                    ->orderBy('name')
                    ->get(),
            ]);
        });
    }
}
