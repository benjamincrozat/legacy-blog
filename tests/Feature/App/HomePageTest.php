<?php

use App\Models\Post;
use function Pest\Laravel\get;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

test('pins are listed', function () {
    Post::factory(10)->pinned()->create();

    $response = get(route('home'))
        ->assertOk()
        ->assertViewIs('home');

    expect($response->viewData('pins'))->toBeInstanceOf(Collection::class);
    expect($response->viewData('pins'))->toHaveCount(4);
});

test('posts are listed', function () {
    Post::factory(30)->create();

    $response = get(route('home'))
        ->assertOk()
        ->assertViewIs('home');

    expect($response->viewData('posts'))->toBeInstanceOf(LengthAwarePaginator::class);
    expect($response->viewData('posts'))->toHaveCount(12);
});
