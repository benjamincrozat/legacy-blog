<?php

use App\Models\Category;
use Illuminate\Support\Facades\Event;
use Illuminate\Cache\Events\KeyForgotten;

it('refreshes the cache when a category is deleted', function () {
    Event::fake([KeyForgotten::class]);

    $category = Category::factory()->hasPosts()->create();

    $category->delete();

    Event::assertDispatched(
        KeyForgotten::class,
        fn (KeyForgotten $event) => "category_$category->slug" === $event->key
    );
});
