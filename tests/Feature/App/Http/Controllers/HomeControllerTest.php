<?php

use App\Models\Category;

use function Pest\Laravel\get;

test('the homepage works and displays the categories', function () {
    Category::factory(3)->hasPosts(3)->create();

    get(route('home'))
        ->assertOk()
        ->assertViewIs('home')
        ->assertViewHas('categories');
});
