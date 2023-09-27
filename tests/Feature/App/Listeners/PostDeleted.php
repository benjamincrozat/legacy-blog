<?php

use App\Models\Post;
use Illuminate\Support\Facades\Event;
use Illuminate\Cache\Events\KeyWritten;
use Illuminate\Cache\Events\KeyForgotten;

it('refreshes the cache when a post is deleted', function () {
    Event::fake([
        KeyForgotten::class,
    ]);

    Post::factory(10)->published()->forUser()->createQuietly();

    $post = Post::factory()->published()->forUser()->createQuietly();

    $post->delete();

    Event::assertDispatched(
        KeyForgotten::class,
        fn (KeyForgotten $event) => "post_$post->slug" === $event->key
    );

    Event::assertDispatched(KeyWritten::class, function (KeyWritten $event) use ($post) {
        return "post_$post->slug" === $event->key ||
               'post_latest' === $event->key ||
               'post_popular' === $event->key ||
               preg_match('/post_\d+_recommendations/', $event->key);
    });
});
