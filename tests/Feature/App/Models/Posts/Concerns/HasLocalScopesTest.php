<?php

use App\Models\Posts\Post;

it('gets posts as a sequence', function () {
    $posts = Post::factory(30)->create();

    $ids = $posts->shuffle()->take(4)->pluck('id');

    $sequence = Post::asSequence($ids)->get();

    expect($sequence->get(0)->id)->toEqual($ids->get(0));
    expect($sequence->get(1)->id)->toEqual($ids->get(1));
    expect($sequence->get(2)->id)->toEqual($ids->get(2));
    expect($sequence->get(3)->id)->toEqual($ids->get(3));
});

it('has a withUser() scope', function () {
    Post::factory()->create();

    $post = Post::withUser()->first();

    expect($post->user->name)->toEqual($post->user_name);
    expect($post->user->email)->toEqual($post->user_email);
});
