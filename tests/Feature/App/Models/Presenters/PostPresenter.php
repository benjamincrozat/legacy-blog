<?php

use App\Models\Post;

it('presents the image with the right Cloudinary parameters', function () {
    $post = Post::factory()->create([
        'image' => 'https://res.cloudinary.com/foo/image/upload/v123/image',
    ]);

    expect($post->presenter()->image())
        ->toBe('https://res.cloudinary.com/foo/image/upload/dpr_auto,f_auto,q_auto,w_auto/v123/image');
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
