<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        View::composer(
            '*', fn ($v) => $v->with([
                'affiliates' => collect(['affiliates.cloudways', 'affiliates.fathom-analytics', 'affiliates.jasper']),
            ])
        );
    }
}
