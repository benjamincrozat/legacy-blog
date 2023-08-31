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
    $posts = Post::factory(10)->published()->create();

    $posts->each(function (Post $post) {
        $item = $post->toFeedItem();

        $link = route('posts.show', $post);

        $this->assertEquals($link, $item->id);
        $this->assertEquals($post->title, $item->title);
        $this->assertEquals($post->presenter()->teaser(), $item->summary);
        $this->assertEquals($post->created_at, $item->updated);
        $this->assertEquals("$link?utm_source=feed", $item->link);
        $this->assertEquals($post->user->name, $item->authorName);
    });
});
