<?php

use App\Models\Post;
use Illuminate\Support\Facades\Event;
use Illuminate\Cache\Events\KeyWritten;
use Illuminate\Cache\Events\KeyForgotten;

it('refreshes the cache when a post is deleted', function () {
    Event::fake([
        KeyForgotten::class,
        KeyWritten::class,
    ]);

    Post::factory(10)->published()->forUser()->create();

    $post = Post::factory()->published()->forUser()->create();

    $post->delete();

    Event::assertDispatched(
        KeyForgotten::class,
        fn (KeyForgotten $event) => "post_$post->slug" === $event->key
    );

    Event::assertDispatched(KeyWritten::class, function (KeyWritten $event) {
        return 'post_latest' === $event->key ||
               'post_popular' === $event->key ||
               preg_match('/post_\d+_recommendations/', $event->key);
    });
});
