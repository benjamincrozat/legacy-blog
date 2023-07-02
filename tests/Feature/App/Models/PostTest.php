<?php

use App\Models\Post;
use App\Models\Redirect;
use function Pest\Laravel\getJson;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;

it('creates a redirect when slug changes', function () {
    $post = Post::factory()->create();

    $original = $post->slug;

    $post->update(['slug' => fake()->slug()]);

    assertDatabaseHas(Redirect::class, [
        'from' => $original,
        'to' => $post->slug,
    ]);
});

it('does not create a redirect when slug does not change', function () {
    $post = Post::factory()->create();

    $post->update(['slug' => $post->slug]);

    assertDatabaseMissing(Redirect::class, [
        'from' => $post->slug,
        'to' => $post->slug,
    ]);
});

test('gets posts as a sequence', function () {
    $posts = Post::factory(30)->create();

    $ids = $posts->shuffle()->take(4)->pluck('id');

    $sequence = Post::asSequence($ids)->get();

    expect($sequence->get(0)->id)->toEqual($ids->get(0));
    expect($sequence->get(1)->id)->toEqual($ids->get(1));
    expect($sequence->get(2)->id)->toEqual($ids->get(2));
    expect($sequence->get(3)->id)->toEqual($ids->get(3));
});

test('has a with user scope', function () {
    Post::factory()->create();

    $post = Post::withUser()->first();

    expect($post->user->name)->toEqual($post->user_name);
    expect($post->user->email)->toEqual($post->user_email);
});

test('feeds the feed', function () {
    Post::factory(10)->create();

    getJson('/feed')
        ->assertOk();
});
