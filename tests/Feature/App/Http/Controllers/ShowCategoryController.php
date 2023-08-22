<?php

use App\Models\Category;

use function Pest\Laravel\get;

test('a given category is shown', function () {
    $category = Category::factory()->hasPosts(3)->create();

    get(route('categories.show', $category))
        ->assertOk()
        ->assertViewIs('categories.show')
        ->assertViewHas('category');
});
