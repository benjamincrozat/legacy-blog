<?php

namespace App\Providers;

use Livewire\Volt\Volt;
use Illuminate\Support\ServiceProvider;

class VoltServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        Volt::mount([
            resource_path('views/livewire'),
            resource_path('views/pages'),
        ]);
    }
}
