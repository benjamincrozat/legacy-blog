<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;
use App\Nova\Metrics\PostsIntent;
use App\Nova\Metrics\AffiliateClicks;
use App\Nova\Metrics\SubscribersCount;

class MainDashboard extends Dashboard
{
    public function cards() : array
    {
        return [
            new PostsIntent,
            new AffiliateClicks,
            new SubscribersCount,
        ];
    }

    public function uriKey() : string
    {
        return 'main-dashboard';
    }
}
