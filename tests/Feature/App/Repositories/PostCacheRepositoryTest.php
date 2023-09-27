<?php

use App\Models\Post;
use Illuminate\Support\Collection;
use Facades\App\Repositories\PostCacheRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

it('fetches a given article', function () {
    $created = Post::factory()->published()->createQuietly();

    $fetched = PostCacheRepository::get($created->slug);

    expect($fetched)->toBeInstanceOf(Post::class);
});

it('fetches the latest articles without pagination', function () {
    Post::factory(10)->published()->createQuietly();

    $latest = PostCacheRepository::latest();

    expect($latest)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(10);
});

it('fetches the latest articles with pagination', function () {
    Post::factory(10)->published()->createQuietly();

    $latest = PostCacheRepository::latest(2);

    expect($latest)
        ->toBeInstanceOf(LengthAwarePaginator::class)
        ->toHaveCount(10);
});

it('fetches popular articles', function () {
    Post::factory(10)->published()->createQuietly();

    $popular = PostCacheRepository::popular();

    expect($popular)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(10);
});

it('fetches recommendations for a given article', function () {
    Post::factory(10)->published()->createQuietly();

    $recommendations = PostCacheRepository::recommendations(
        Post::factory()->published()->create()->id
    );

    expect($recommendations)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(10);
});
