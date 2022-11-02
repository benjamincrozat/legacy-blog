<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot() : void
    {
        parent::boot();

        Nova::initialPath('/resources/users');
    }

    protected function routes() : void
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    protected function gate() : void
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'benjamincrozat@me.com',
            ]);
        });
    }

    protected function dashboards() : array
    {
        return [];
    }

    public function tools() : array
    {
        return [];
    }
}
