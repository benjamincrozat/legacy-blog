<?php

namespace App\Providers;

use App\Models\Affiliate;
use App\Models\Subscriber;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\QueryException;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        Blade::anonymousComponentPath(resource_path('views/posts/components'), 'posts');

        try {
            View::share(
                'ads', Affiliate::query()
                    ->whereNotNull('ad_title')
                    ->whereNotNull('ad_content')
                    ->inRandomOrder()
                    ->limit(3)
                    ->get()
            );

            View::share('subscribersCount', Subscriber::count());
        } catch (QueryException $e) {
            View::share('subscribersCount', 0);
        }
    }
}
