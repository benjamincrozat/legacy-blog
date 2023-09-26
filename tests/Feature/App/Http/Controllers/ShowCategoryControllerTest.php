<?php

use App\Models\Post;
use App\Models\Category;

use function Pest\Laravel\get;

use Illuminate\Pagination\LengthAwarePaginator;

test('a given category is shown and contains all its published posts', function () {
    $category = Category::factory()
        ->hasPosts(3, ['published_at' => now()])
        ->hasRelated(3)
        ->create();

    $response = get(route('categories.show', $category->slug))
        ->assertOk()
        ->assertViewHas('posts', fn (LengthAwarePaginator $posts) => 3 === $posts->count());

    $posts = $response->viewData('posts');

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $response->assertView('categories.show');

    $view
        ->contains("Learn about $category->name");

    $category->posts->each(function (Post $post) use ($view) {
        $view->contains(route('posts.show', $post->slug));
        $view->contains($post->title);
    });
});
