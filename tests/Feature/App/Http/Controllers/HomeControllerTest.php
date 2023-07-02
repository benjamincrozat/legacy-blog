<?php

use App\Models\Post;
use function Pest\Laravel\get;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

it('lists pins', function () {
    Post::factory(10)->pinned()->create();

    $response = get(route('home'))->assertOk()->assertViewIs('home');

    $pins = $response->viewData('pins');

    expect($pins)->toBeInstanceOf(Collection::class);
    expect($pins)->toHaveCount(4);
});

it('lists popular posts', function () {
    Post::factory(10)->create();

    $response = get(route('home'))->assertOk()->assertViewIs('home');

    $popular = $response->viewData('popular');

    expect($popular)->toBeInstanceOf(Collection::class);
    expect($popular)->toHaveCount(6);
});

it('lists posts', function () {
    Post::factory(30)->create();

    $response = get(route('home'))->assertOk()->assertViewIs('home');

    $posts = $response->viewData('posts');

    expect($posts)->toBeInstanceOf(Paginator::class);
    expect($posts)->toHaveCount(20);
});
