<?php

namespace App\Providers;

use App\Nova\Pin;
use App\Nova\Post;
use App\Nova\User;
use App\Nova\Redirect;
use Laravel\Nova\Nova;
use App\Nova\Affiliate;
use Laravel\Nova\Menu\Menu;
use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot() : void
    {
        parent::boot();

        Nova::initialPath('/resources/posts');

        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::make('Blog', [
                    MenuItem::resource(Post::class),
                    MenuItem::resource(Pin::class),
                    MenuItem::resource(User::class),
                ])->icon('newspaper')->collapsable(),

                MenuSection::make('Business', [
                    MenuItem::resource(Affiliate::class),
                ])->icon('briefcase')->collapsable(),

                MenuSection::make('Other', [
                    MenuItem::resource(Redirect::class),
                ])->icon('dots-horizontal')->collapsable(),
            ];
        });

        Nova::userMenu(function (Request $request, Menu $menu) {
            return $menu->prepend([
                MenuItem::externalLink('Go to ' . config('app.name'), url('/')),
                MenuItem::make('Update Profile', "/resources/users/{$request->user()->getKey()}/edit"),
            ]);
        });

        Nova::footer(fn () => '');
    }

    public function tools() : array
    {
        return [];
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
        Gate::define('viewNova', fn () => true);
    }

    protected function dashboards() : array
    {
        return [];
    }
}
