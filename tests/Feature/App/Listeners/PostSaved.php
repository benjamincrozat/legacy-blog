<?php

use App\Models\Post;
use Illuminate\Support\Facades\Event;
use Illuminate\Cache\Events\KeyWritten;

it('refreshes the cache when a post is saved', function () {
    Event::fake([KeyWritten::class]);

    Post::factory(10)->published()->forUser()->createQuietly();

    $post = Post::factory()->published()->forUser()->create();

    Event::assertDispatched(KeyWritten::class, function (KeyWritten $event) use ($post) {
        return "post_$post->slug" === $event->key ||
               'post_latest' === $event->key ||
               'post_popular' === $event->key ||
               preg_match('/post_\d+_recommendations/', $event->key);
    });
});
