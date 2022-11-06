<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;
use App\Nova\Metrics\PostsCount;
use App\Nova\Metrics\PostsIntent;
use App\Nova\Metrics\AffiliateClicks;
use App\Nova\Metrics\AffiliatesCount;
use App\Nova\Metrics\SubscribersCount;
use App\Nova\Metrics\ActiveBannersCount;

class Main extends Dashboard
{
    public function cards() : array
    {
        return [
            new PostsCount,
            new PostsIntent,
            new AffiliatesCount,
            new ActiveBannersCount,
            new AffiliateClicks,
            new SubscribersCount,
        ];
    }
}
