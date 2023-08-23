<?php

use App\Models\Post;

use function Pest\Laravel\get;

test('a given published post is shown', function () {
    $post = Post::factory()->published()->create();

    get(route('posts.show', $post))
        ->assertOk()
        ->assertViewIs('posts.show')
        ->assertViewHas('post');
});
