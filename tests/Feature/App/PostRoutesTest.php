<?php

use App\Models\Post;
use function Pest\Laravel\get;
use Illuminate\Support\Collection;

it('shows a given post and list the recommended excluding the current one', function () {
    $posts = Post::factory(30)->create();

    $response = get(route('posts.show', $posts->first()))
        ->assertOk()
        ->assertViewIs('posts.show');

    expect($response->viewData('post'))->toBeInstanceOf(Post::class);

    expect($response->viewData('recommended'))->toBeInstanceOf(Collection::class);
    expect($response->viewData('recommended'))->toHaveCount(10);
    expect($response->viewData('recommended')->contains($posts->first()))->toBeFalse();
});
