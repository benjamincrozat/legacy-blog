<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;
use App\Nova\Metrics\PostsIntent;
use App\Nova\Metrics\SubscribersCount;

class Main extends Dashboard
{
    public function cards() : array
    {
        return [
            new PostsIntent,
            new SubscribersCount,
        ];
    }
}
