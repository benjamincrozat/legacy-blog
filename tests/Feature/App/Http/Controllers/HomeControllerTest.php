<?php

use App\Models\Category;

use function Pest\Laravel\get;

test('the homepage works and displays the categories along with published posts', function () {
    Category::factory(3)->hasPosts(5, ['is_published' => true])->create();

    $response = get(route('home'))
        ->assertOk()
        ->assertViewIs('home');

    $response->viewData('categories')->each(
        fn (Category $category) => expect($category->latestPosts->isNotEmpty())->toBeTrue()
    );
});
