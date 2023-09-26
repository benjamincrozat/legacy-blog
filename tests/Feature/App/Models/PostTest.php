<?php

use App\Models\Post;
use App\Events\PostSaved;
use App\Events\PostDeleted;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Event;
use App\Models\Presenters\PostPresenter;

it('dispatches an event when saved', function () {
    Event::fake([PostSaved::class]);

    $post = Post::factory()->published()->forUser()->create();

    Event::assertDispatched(
        PostSaved::class,
        fn (PostSaved $event) => $event->post->is($post)
    );
});

it('refreshes the cache when deleted', function () {
    Event::fake([PostDeleted::class]);

    $post = Post::factory()->published()->forUser()->createQuietly();

    $post->delete();

    Event::assertDispatched(
        PostDeleted::class,
        fn (PostDeleted $event) => $event->post->is($post)
    );
});

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
