<?php

use App\Models\Post;
use Illuminate\Support\Facades\Event;
use Illuminate\Cache\Events\KeyWritten;
use Illuminate\Cache\Events\KeyForgotten;

it("refreshes the cache when a post is created and there's nothing to forget", function () {
    Event::fake([
        KeyForgotten::class,
        KeyWritten::class,
    ]);

    Post::factory(10)->published()->forUser()->create();

    $post = Post::factory()->published()->forUser()->create();

    Event::assertDispatched(KeyWritten::class, function (KeyWritten $event) use ($post) {
        return "post_$post->slug" === $event->key ||
               'post_latest' === $event->key ||
               'post_popular' === $event->key ||
               preg_match('/post_\d+_recommendations/', $event->key);
    });
});

it('refreshes the cache when a post is saved', function () {
    Event::fake([
        KeyForgotten::class,
        KeyWritten::class,
    ]);

    Post::factory(10)->published()->forUser()->create();

    $post = Post::factory()->published()->forUser()->create();

    $post->update(['title' => 'Foo']);

    Event::assertDispatched(KeyForgotten::class, function (KeyForgotten $event) use ($post) {
        return "post_$post->slug" === $event->key ||
               'post_latest' === $event->key ||
               'post_popular' === $event->key ||
               preg_match('/post_\d+_recommendations/', $event->key);
    });

    Event::assertDispatched(KeyWritten::class, function (KeyWritten $event) use ($post) {
        return "post_$post->slug" === $event->key ||
               'post_latest' === $event->key ||
               'post_popular' === $event->key ||
               preg_match('/post_\d+_recommendations/', $event->key);
    });
});
