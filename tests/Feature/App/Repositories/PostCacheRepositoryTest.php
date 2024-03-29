<?php

use App\Models\Post;
use App\Facades\Posts;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

it('fetches a given article', function () {
    $created = Post::factory()->published()->createQuietly();

    $fetched = Posts::get($created->slug);

    expect($fetched)->toBeInstanceOf(Post::class);
});

it('fetches the latest articles without pagination', function () {
    Post::factory(10)->published()->createQuietly();

    $latest = Posts::latest();

    expect($latest)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(9);
});

it('fetches the latest articles with pagination', function () {
    Post::factory(10)->published()->createQuietly();

    $latest = Posts::latest(2);

    expect($latest)
        ->toBeInstanceOf(LengthAwarePaginator::class);
});

it('fetches popular articles', function () {
    Post::factory(10)->published()->createQuietly();

    $popular = Posts::popular();

    expect($popular)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(9);
});

it('fetches recommendations for a given article', function () {
    Post::factory(10)->published()->createQuietly();

    $recommendations = Posts::recommendations(
        Post::factory()->published()->create()->id
    );

    expect($recommendations)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(9);
});
