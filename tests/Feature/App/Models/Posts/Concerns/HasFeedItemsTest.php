<?php

use App\Models\Posts\Post;
use function Pest\Laravel\get;

test('the feed works', function () {
    Post::factory(10)->create();

    // We ensure the feed doesn't have a server error.
    get('/feed')
        ->assertOk();
});

test('values are mapped correctly', function () {
    $posts = Post::factory(10)->create();

    $posts->each(function (Post $post) {
        $item = $post->toFeedItem();

        $link = route('posts.show', $post);

        $this->assertEquals($link, $item->id);
        $this->assertEquals($post->title, $item->title);
        $this->assertEquals($post->rendered_teaser, $item->summary);
        $this->assertEquals($post->created_at, $item->updated);
        $this->assertEquals($link, $item->link);
        $this->assertEquals($post->user->name, $item->authorName);
    });
});
