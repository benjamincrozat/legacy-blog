<?php

use App\Models\Post;

use function Pest\Laravel\get;

test('a given post is shown', function () {
    $post = Post::factory()->create();

    get(route('posts.show', $post))
        ->assertOk()
        ->assertViewIs('posts.show')
        ->assertViewHas('post', fn (Post $post) => $post->is($post));
});
