<?php

namespace App\Providers;

use Illuminate\Support\Stringable;
use App\CommonMark\MarxdownConverter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        Stringable::macro(
            'marxdown', fn () => (new MarxdownConverter(torchlight: true))->convert($this->value)
        );

        Stringable::macro('htmlEntityDecode', function () {
            $this->value = html_entity_decode($this->value);

            return $this;
        });
    }
}
