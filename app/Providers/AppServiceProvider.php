<?php

namespace App\Providers;

use Illuminate\Support\Stringable;
use App\CommonMark\MarxdownConverter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Algolia\AlgoliaSearch\RecommendClient;

class AppServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $this->app->bind(RecommendClient::class, fn (Application $app) => RecommendClient::create(
            $app['config']->get('scout.algolia.id'),
            $app['config']->get('scout.algolia.secret')
        ));
    }

    public function boot() : void
    {
        Blade::anonymousComponentPath(resource_path('views/posts/components'), 'posts');

        Model::preventAccessingMissingAttributes(! app()->isProduction());

        Model::unguard();

        // Marxdown is a named I invented for Markdown with extra features.
        Stringable::macro(
            'marxdown', fn () => (new MarxdownConverter(torchlight: true))->convert($this->value)
        );

        Stringable::macro('htmlEntityDecode', function () {
            $this->value = html_entity_decode($this->value);

            return $this;
        });
    }
}
