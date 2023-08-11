<?php

use App\Models\Posts\Post;
use function Pest\Laravel\get;
use Illuminate\Pagination\LengthAwarePaginator;

test('community links are listed', function () {
    Post::factory(5)->create();
    Post::factory(5)->asCommunityLink()->create();

    $response = get(route('community'))
        ->assertOk()
        ->assertViewIs('community');

    $posts = $response->viewData('posts');

    expect($posts)->toBeInstanceOf(LengthAwarePaginator::class);
    expect($posts)->toHaveCount(5);
    $posts->each(
        fn ($post) => expect($post->community_link)->not->toBeNull()
    );
});
