<?php

namespace App\Providers;

use Illuminate\Support\Str;
use App\CommonMark\MarxdownConverter;
use App\CommonMark\LightdownConverter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        Str::macro(
            'lightdown',
            fn ($s) => (new LightdownConverter())->convert($s)
        );

        Str::macro(
            'marxdown',
            fn ($s) => (new MarxdownConverter())->convert($s)
        );
    }
}
