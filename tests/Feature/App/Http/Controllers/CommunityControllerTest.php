<?php

use App\Models\Posts\Post;
use function Pest\Laravel\get;
use Illuminate\Pagination\LengthAwarePaginator;

test('community links are listed', function () {
    Post::factory(10)->create();
    Post::factory(10)->asCommunityLink()->create();

    $response = get(route('community'))
        ->assertOk()
        ->assertViewIs('community');

    $posts = $response->viewData('posts');

    expect($posts)->toBeInstanceOf(LengthAwarePaginator::class);
    expect($posts)->toHaveCount(10);
    $posts->each(
        fn ($post) => expect($post->community_link)->not->toBeNull()
    );
});
