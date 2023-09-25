<?php

use App\Models\Post;
use Illuminate\Support\Facades\Event;
use Illuminate\Cache\Events\KeyWritten;
use Illuminate\Cache\Events\KeyForgotten;
use Facades\App\Repositories\PostCacheRepository as Posts;

beforeEach(function () {
    cache()->flush();
});

it('refreshes the cache for posts listings when a post is deleted', function () {
    Event::fake([
        KeyForgotten::class,
        KeyWritten::class,
    ]);

    Post::factory(10)->published()->forUser()->create();

    $post = Post::factory()->published()->forUser()->createQuietly();

    Posts::get($post->slug);

    $post->delete();

    Event::assertDispatchedTimes(KeyForgotten::class, 1);
    Event::assertDispatchedTimes(KeyWritten::class, 23);
});
