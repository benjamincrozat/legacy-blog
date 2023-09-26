<?php

use App\Models\Post;
use App\Models\Category;

it('displays a post correctly', function () {
    $post = Post::factory()->published()->hasCategories(3)->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.post', compact('post'));

    $view
        ->first('a')
        ->hasAttribute('href', route('posts.show', $post->slug));

    $view->contains('Updated on');
    $view->contains($post->presenter()->lastUpdated());

    $post->categories->each(function (Category $category) use ($view) {
        $view
            ->first('a[href="' . route('categories.show', $category->slug) . '"]')
            ->contains($category->name);
    });
});

it('displays a community post correctly', function () {
    $post = Post::factory()->published()->hasCategories(3)->asCommunityLink()->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.post', compact('post'));

    $view
        ->first('a')
        ->hasAttribute('href', $post->community_link);

    $view->contains('Shared on');
    $view->contains($post->presenter()->lastUpdated());

    $post->categories->each(function (Category $category) use ($view) {
        $view
            ->first('a[href="' . route('categories.show', $category->slug) . '"]')
            ->contains($category->name);
    });
});
