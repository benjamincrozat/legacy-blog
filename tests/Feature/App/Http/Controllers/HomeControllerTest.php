<?php

use App\Models\Category;

use function Pest\Laravel\get;

use Illuminate\Support\Collection;

it('works and displays the categories', function () {
    Category::factory(3)->hasPosts(3)->create();

    get(route('home'))
        ->assertOk()
        ->assertViewIs('home')
        ->assertViewHas(
            'categories', fn (Collection $categories) => 3 === $categories->count()
        );
});
