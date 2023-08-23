<?php

use App\Models\Category;

use function Pest\Laravel\get;

use Illuminate\Support\Collection;

test('a given category is shown and contains all its published posts', function () {
    $category = Category::factory()->hasPosts(3, ['is_published' => true])->create();

    get(route('categories.show', $category))
        ->assertOk()
        ->assertViewIs('categories.show')
        ->assertViewHas('category')
        ->assertViewHas('posts', fn (Collection $posts) => 3 === $posts->count());
});
