<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class EloquentServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        Model::preventAccessingMissingAttributes(! app()->isProduction());

        Model::unguard();
    }
}
