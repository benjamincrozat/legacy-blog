<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Laravel\Nova\Menu\Menu;
use Illuminate\Http\Request;
use App\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuItem;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot() : void
    {
        parent::boot();

        Nova::userMenu(function (Request $request, Menu $menu) {
            return $menu->prepend([
                MenuItem::externalLink('Go to ' . config('app.name'), url('/')),
                MenuItem::make('Update Profile', "/resources/users/{$request->user()->getKey()}/edit"),
            ]);
        });

        Nova::footer(fn () => '');
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
        return [
            new Main,
        ];
    }

    public function tools() : array
    {
        return [];
    }
}
