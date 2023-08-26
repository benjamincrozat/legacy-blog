<?php

use App\Models\Post;

it('displays a post correctly', function () {
    $post = Post::factory()->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.post', compact('post'));

    $view
        ->first('a')
        ->hasAttribute('href', route('posts.show', $post));

    $view->contains('Updated on');
    $view->contains($post->presenter()->lastUpdated());
});

it('displays a community post correctly', function () {
    $post = Post::factory()->asCommunityLink()->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.post', compact('post'));

    $view
        ->first('a')
        ->hasAttribute('href', $post->community_link);

    $view->contains('Shared on');
    $view->contains($post->presenter()->lastUpdated());
});
