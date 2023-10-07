<?php

use App\Models\Post;
use Illuminate\Http\UploadedFile;

it("shows the image when there's one", function () {
    $post = Post::factory()->create();

    $file = UploadedFile::fake()->image('foo.jpg');

    $post->addMedia($file)->toMediaCollection('image');

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('feed-item', compact('post'));

    $view->has('img');
});

it("does not show the image when there isn't one", function () {
    $post = Post::factory()->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('feed-item', compact('post'));

    $view->doesNotContain('<img');
});

it("contains the teaser when there's one and not the description", function () {
    $post = Post::factory()->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('feed-item', compact('post'));

    $view
        ->contains($post->teaser)
        ->doesNotContain($post->description);
});

it("contains the description when there's no teaser", function () {
    $post = Post::factory()->create(['teaser' => null]);

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('feed-item', compact('post'));

    $view->contains($post->description);
});
