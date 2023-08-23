<?php

use App\Models\Post;

use function Pest\Laravel\get;

use Illuminate\Pagination\LengthAwarePaginator;

it('it listed published posts with pagination', function () {
    Post::factory(50)->published()->create();

    get(route('posts.index'))
        ->assertOk()
        ->assertViewIs('posts.index')
        ->assertViewHas('posts', fn (LengthAwarePaginator $posts) => 30 === $posts->count());
});
