<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;

class CategoryDeleted implements ShouldQueue
{
    public function handle(\App\Events\CategoryDeleted $event) : void
    {
        cache()->forget("category_$event->categorySlug");
    }
}
