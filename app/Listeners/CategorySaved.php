<?php

namespace App\Listeners;

use App\Facades\Categories;
use Illuminate\Contracts\Queue\ShouldQueue;

class CategorySaved implements ShouldQueue
{
    public function handle(\App\Events\CategorySaved $event) : void
    {
        cache()->forget("category_{$event->category->slug}");

        Categories::get($event->category->slug);
    }
}
