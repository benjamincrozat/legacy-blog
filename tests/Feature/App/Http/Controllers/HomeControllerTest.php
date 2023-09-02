<?php

use App\Models\Category;

use function Pest\Laravel\get;

test('the homepage works and displays the categories along with published posts', function () {
    Category::factory(3)->hasPosts(5, ['is_published' => true])->create();
    $highlighted = Category::factory()->hasPosts(5, ['is_published' => true])->create(['is_highlighted' => true]);

    $response = get(route('home'))
        ->assertOk()
        ->assertViewIs('home');

    $categories = $response->viewData('categories');

    $categories->each(
        fn (Category $category) => expect($category->latestPosts->isNotEmpty())->toBeTrue()
    );

    expect($categories->first()->id)->toBe($highlighted->id);
});
