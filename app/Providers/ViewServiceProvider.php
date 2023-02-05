<?php

namespace App\Providers;

use App\Models\Subscriber;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        Blade::anonymousComponentPath(resource_path('views/posts/components'), 'posts');

        if (Schema::hasTable('subscribers')) {
            View::share('subscribersCount', Subscriber::count());
        }
    }
}
