<?php

use App\Models\Post;

use function Pest\Laravel\get;

test('the feed works', function () {
    Post::factory(10)->published()->create();

    // We ensure the feed doesn't have an error.
    get('/feed')
        ->assertOk();
});

test('values are mapped correctly', function () {
    Post::factory(10)
        ->published()
        ->create()
        ->each(function (Post $post) {
            $item = $post->toFeedItem();

            $link = route('posts.show', $post->slug);

            expect($item->id)->toBe($link);
            expect($item->title)->toBe($post->title);
            expect($item->summary)->toBe(view('feed-item', compact('post'))->render());
            expect($item->updated->eq($post->published_at))->toBeTrue();
            expect($item->link)->toBe("$link?utm_source=feed");
            expect($item->authorName)->toBe($post->user->name);
        });
});
