<?php

namespace App\Providers;

use Illuminate\Support\Str;
use App\CommonMark\MarxdownConverter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        Str::macro(
            'marxdown',
            fn ($s) => (new MarxdownConverter(torchlight: true))->convert($s)
        );
    }
}
