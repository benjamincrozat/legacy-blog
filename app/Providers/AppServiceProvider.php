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
        $this->app->bind(EmbedExtension::class, fn () => new EmbedExtension);
        $this->app->bind(HighlightCodeExtension::class, fn () => new HighlightCodeExtension('github-dark'));
        $this->app->bind(RecommendClient::class, fn (Application $app) => RecommendClient::create(
            $app['config']->get('scout.algolia.id'),
            $app['config']->get('scout.algolia.secret')
        ));

        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    public function boot() : void
    {
        Model::preventAccessingMissingAttributes(! app()->isProduction());

        Model::unguard();

        View::composer(['components.app', 'home'], function ($view) {
            static $categories;

            $view->with([
                'categories' => $categories ??= Category::with('latestPosts')
                    ->whereHas('posts')
                    ->orderBy('name')
                    ->get(),
            ]);
        });
    }
}
