<?php

use App\Models\Post;

it('displays the date using the published_at attribute', function () {
    $post = Post::factory()->published()->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.post.date', compact('post'));

    $view->contains('Updated on');
    $view->contains($post->presenter()->lastUpdated());
    $view->contains($post->published_at->toDateTimeString());
});

it('displays the date using the manually_updated_at attribute', function () {
    $post = Post::factory()->published()->create([
        'manually_updated_at' => now(),
    ]);

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.post.date', compact('post'));

    $view->contains('Updated on');
    $view->contains($post->presenter()->lastUpdated());
    $view->contains($post->manually_updated_at->toDateTimeString());
});

it('uses another label for community links', function () {
    $post = Post::factory()->published()->asCommunityLink()->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.post.date', compact('post'));

    $view->contains('Shared on');
    $view->contains($post->presenter()->lastUpdated());
    $view->contains($post->published_at->toDateTimeString());
});
