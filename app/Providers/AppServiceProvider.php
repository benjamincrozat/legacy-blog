<?php

namespace App\Providers;

use App\ConvertKit\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Client\Factory;
use App\CommonMark\MarxdownConverter;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $this->app->bind(Client::class, fn (Application $app) => new Client($app->make(Factory::class)));
    }

    public function boot() : void
    {
        Str::macro('marxdown', function (string $string) {
            $html = (string) MarxdownConverter::make()->convert($string);

            return preg_replace_callback('/<h(\d)>(.*)<\/h\d>/', function ($matches) {
                $cleanedUpStringForId = html_entity_decode(strip_tags($matches[2]));

                return '<h' . $matches[1] . ' id="' . Str::slug($cleanedUpStringForId) . '">' . $matches[2] . '</h' . $matches[1] . '>';
            }, $html);
        });

        View::composer(
            '*', fn ($v) => $v->with([
                'affiliates' => collect(['affiliates.cloudways', 'affiliates.fathom', 'affiliates.jasper']),
            ])
        );
    }
}
