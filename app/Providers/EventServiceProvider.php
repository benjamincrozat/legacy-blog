<?php

namespace App\Providers;

use App\Models\Post;
use App\Observers\PostObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [];

    protected $observers = [
        Post::class => [PostObserver::class],
    ];

    public function shouldDiscoverEvents() : bool
    {
        return true;
    }
}
