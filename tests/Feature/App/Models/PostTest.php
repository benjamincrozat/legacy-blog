<?php

use App\Models\Post;
use Illuminate\Support\Carbon;
use App\Presenters\PostPresenter;

it('casts the published_at attribute to a Carbon instance', function () {
    $post = Post::factory()->published()->create();

    expect($post->published_at)->toBeInstanceOf(Carbon::class);
});

it('casts the manually_updated_at attribute to a Carbon instance', function () {
    $post = Post::factory()->published()->create(['manually_updated_at' => now()]);

    expect($post->manually_updated_at)->toBeInstanceOf(Carbon::class);
});

it('has a presenter', function () {
    $post = Post::factory()->make();

    expect($post->presenter())->toBeInstanceOf(PostPresenter::class);
});

it('has searchable attributes', function () {
    $post = Post::factory()->published()->make();

    $searchable = $post->toSearchableArray();

    expect($searchable)
        ->toBe([
            'id' => $post->id,
            'user_name' => $post->user->name,
            'title' => $post->title,
            'slug' => $post->slug,
            'content' => $post->content,
            'description' => $post->description,
            'teaser' => $post->teaser,
            'community_link' => $post->community_link,
            'categories' => $post->categories->pluck('name')->toArray(),
        ]);
});

it('has media collections', function () {
    $post = new Post;

    $collections = $post->getRegisteredMediaCollections();

    expect($collections[0]->name)->toBe('image');

    expect($collections[1]->name)->toBe('images');
});
