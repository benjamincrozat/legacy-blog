<?php

use App\Models\Redirect;
use App\Models\Posts\Post;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

it('creates a redirect when slug changes', function () {
    $post = Post::factory()->create();

    $original = $post->slug;

    $post->update(['slug' => fake()->slug()]);

    assertDatabaseHas(Redirect::class, [
        'from' => $original,
        'to' => $post->slug,
    ]);
});

it('does not create a redirect when slug does not change', function () {
    $post = Post::factory()->create();

    $post->update(['slug' => $post->slug]);

    assertDatabaseMissing(Redirect::class, [
        'from' => $post->slug,
        'to' => $post->slug,
    ]);
});
