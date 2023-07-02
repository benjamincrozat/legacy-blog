<?php

use App\Models\Post;
use function Pest\Laravel\get;
use Illuminate\Support\Collection;

it('shows a given post and list recommended posts excluding the current and ai ones', function () {
    $posts = Post::factory(30)->create();

    $response = get(route('posts.show', $post = $posts->first()))
        ->assertOk()
        ->assertViewIs('posts.show');

    expect($response->viewData('post'))->toBeInstanceOf(Post::class);

    $recommended = $response->viewData('recommended');

    expect($recommended)->toBeInstanceOf(Collection::class);
    expect($recommended)->toHaveCount(10);
    expect($recommended->contains($post))->toBeFalse();
});
