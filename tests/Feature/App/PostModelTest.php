<?php

use App\Models\Post;
use App\Models\Redirect;
use function Pest\Laravel\get;
use Illuminate\Support\Collection;
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

it('gets posts as a sequence', function () {
    $posts = Post::factory(30)->create();

    $ids = $posts->shuffle()->take(4)->pluck('id');

    $sequence = Post::asSequence($ids)->get();

    expect($sequence->get(0)->id)->toEqual($ids->get(0));
    expect($sequence->get(1)->id)->toEqual($ids->get(1));
    expect($sequence->get(2)->id)->toEqual($ids->get(2));
    expect($sequence->get(3)->id)->toEqual($ids->get(3));
});

it('has a with user scope', function () {
    Post::factory()->create();

    $post = Post::withUser()->first();

    expect($post->user->name)->toEqual($post->user_name);
    expect($post->user->email)->toEqual($post->user_email);
});

it('feeds the feed', function () {
    Post::factory(10)->create();

    get('/feed')
        ->assertOk();
});

it('shows a given post and list the recommended excluding the current one', function () {
    $posts = Post::factory(30)->create();

    $response = get(route('posts.show', $post = $posts->first()))
        ->assertOk()
        ->assertViewIs('posts.show');

    expect($response->viewData('post'))->toBeInstanceOf(Post::class);

    $recommended = $response->viewData('recommended');

    expect($recommended)->toBeInstanceOf(Collection::class);
    expect($recommended)->toHaveCount(10);
    expect($recommended->contains($post))->toBeFalse();
});
