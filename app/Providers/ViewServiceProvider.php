<?php

namespace App\Providers;

use App\Models\Banner;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    protected ?Collection $banners = null;

    public function boot() : void
    {
        View::composer('*', function (\Illuminate\View\View $view) {
            $view->with([
                'banners' => $this->banners ??= Banner::active()->inRandomOrder()->get(),
            ]);
        });
    }
}
