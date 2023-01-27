<?php

namespace App\Providers;

use App\ConvertKit\Client;
use App\Models\Subscriber;
use Illuminate\Support\Str;
use Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\View;
use App\CommonMark\MarxdownConverter;
use App\CommonMark\LightdownConverter;
use Illuminate\Foundation\Application;
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
        Str::macro(
            'lightdown',
            fn ($string) => (new LightdownConverter())->convert($string)
        );

        Str::macro(
            'marxdown',
            fn ($string) => (new MarxdownConverter())->convert($string)
        );

        View::composer(
            'components.newsletter',
            fn ($v) => $v->with('subscribersCount', Subscriber::count())
        );
    }
}
