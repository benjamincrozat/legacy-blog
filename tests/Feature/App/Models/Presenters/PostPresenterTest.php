<?php

use App\Models\Post;

it('presents the image', function () {
    ($post = Post::factory()->create())
        ->addMediaFromUrl(fake()->imageUrl(50, 50))
        ->toMediaCollection('image');

    expect($post->presenter()->image())->not->toBeNull();
});

it('presents the community link domain', function () {
    $post = Post::factory()->create([
        'community_link' => 'https://www.example.com',
    ]);

    expect($post->presenter()->communityLinkDomain())
        ->toBe('example.com');
});

it('presents the last update date', function () {
    $post = Post::factory()->create();

    expect($post->presenter()->lastUpdated())
        ->toBe($post->created_at->isoFormat('LL'));

    $post->update(['manually_updated_at' => now()->addDay()]);

    expect($post->presenter()->lastUpdated())
        ->toBe($post->manually_updated_at->isoFormat('LL'));
});
