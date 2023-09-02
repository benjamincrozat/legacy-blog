<?php

use App\Models\Category;

use function Pest\Laravel\get;

test('the homepage works and displays the categories along with published posts with the highlighted ones first', function () {
    $fakeCategories = Category::factory(3)
        ->sequence(
            ['is_highlighted' => true],
            ['is_highlighted' => false],
            ['is_highlighted' => false],
        )
        ->hasPosts(5, ['is_published' => true])
        ->create();

    $categories = get(route('home'))
        ->assertOk()
        ->assertViewIs('home')
        ->viewData('categories')
        ->each(
            fn (Category $category) => expect($category->latestPosts->isNotEmpty())->toBeTrue()
        );

    expect($categories->first()->id)->toBe($fakeCategories->first()->id);
});
