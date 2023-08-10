<?php

use App\Models\Posts\Post;
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

test('popular posts that are not community links are listed', function () {
    Post::factory(10)->pinned()->create();

    $response = get(route('home'))
        ->assertOk()
        ->assertViewIs('home');

    $popular = $response->viewData('popular');

    expect($popular)->toBeInstanceOf(Collection::class);
    expect($popular)->toHaveCount(6);
    $popular->each(function ($post) {
        expect($post->is_community_link)->toBeFalsy();
    });
});

test('community links are listed', function () {
    Post::factory(10)->pinned()->create();

    $response = get(route('home'))
        ->assertOk()
        ->assertViewIs('home');

    $community = $response->viewData('community');

    expect($community)->toBeInstanceOf(Collection::class);
    expect($community)->toHaveCount(10);
    $community->each(function ($post) {
        expect($post->is_community_link)->toBeTruthy();
    });
});

test('posts that are not community links are listed', function () {
    Post::factory(30)->create();

    $response = get(route('home'))
        ->assertOk()
        ->assertViewIs('home');

    $posts = $response->viewData('posts');

    expect($posts)->toBeInstanceOf(LengthAwarePaginator::class);
    expect($posts)->toHaveCount(16);
    $posts->each(function ($post) {
        expect($post->is_community_link)->toBeFalsy();
    });
});
