<?php

use App\Models\Category;

it('displays the categories with a wire:navigate.hover link', function () {
    $categories = Category::factory(3)->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.post.categories', compact('categories'));

    $categories->each(function (Category $category) use ($view) {
        $view
            ->first("a[href$=\"/categories/$category->slug\"]")
            ->contains('wire:navigate.hover')
            ->hasAttribute('style', 'color: ' . $category->presenter()->secondaryColor() . '; background-color: ' . $category->presenter()->primaryColor())
            ->contains($category->name);
    });
});
