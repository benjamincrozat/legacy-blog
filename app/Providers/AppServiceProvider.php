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
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(Client::class, fn (Application $app) => new Client($app->make(Factory::class)));
    }

    public function boot(): void
    {
        Str::macro(
            'lightdown',
            fn ($string) => (new LightdownConverter())->convert($string)
        );

        Str::macro('marxdown', function (string $string) {
            $html = (string) MarxdownConverter::make()->convert($string);

            return preg_replace_callback('/<h(\d)>(.*)<\/h\d>/', function ($matches) {
                $cleanedUpStringForId = html_entity_decode(strip_tags($matches[2]));

                return '<h' . $matches[1] . ' id="' . Str::slug($cleanedUpStringForId) . '">' . $matches[2] . '</h' . $matches[1] . '>';
            }, $html);
        });

        View::composer(
            'components.newsletter',
            fn ($v) => $v->with('subscribersCount', Subscriber::count())
        );
    }
}
