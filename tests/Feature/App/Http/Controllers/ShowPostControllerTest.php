<?php

use App\Models\Post;
use App\Models\User;

use function Pest\Laravel\get;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertGuest;

test('a given published post is shown correctly', function () {
    Post::factory(3)->published()->create();

    $post = Post::factory()->published()->create();

    $link = route('posts.show', $post);

    /** @var NunoMaduro\LaravelMojito\ViewAssertion */
    $view = get($link)
        ->assertOk()
        ->assertView('posts.show');

    $view->has('title')->contains($post->title);

    $view->hasMeta([
        'name' => 'description',
        'content' => $post->description,
    ]);

    $view->first('link[rel="canonical"]')->hasAttribute('href', $link);

    $view
        ->first("a[href=\"https://github.com/{$post->user->github_handle}\"]")
        ->hasAttribute('target', '_blank')
        ->hasAttribute('rel', 'nofollow noopener noreferrer');

    $view
        ->first("a[href=\"https://x.com/{$post->user->x_handle}\"]")
        ->hasAttribute('target', '_blank')
        ->hasAttribute('rel', 'nofollow noopener noreferrer');

    $post->recommendations->each(function (Post $post) use ($view) {
        $view->contains($post->title);
    });
});

test('a given published community post is shown correctly', function () {
    Post::factory(3)->published()->create();

    $post = Post::factory()->asCommunityLink()->published()->create();

    /** @var NunoMaduro\LaravelMojito\ViewAssertion */
    $view = get(route('posts.show', $post))
        ->assertOk()
        ->assertView('posts.show');

    $view->has('title')->contains($post->title);

    $view->hasMeta([
        'name' => 'description',
        'content' => $post->description,
    ]);

    $view->first('link[rel="canonical"]')->hasAttribute('href', $post->community_link);

    $view->contains('Read more on ' . $post->presenter()->communityLinkDomain());

    $view
        ->first("a[href=\"$post->community_link\"]")
        ->hasAttribute('target', '_blank')
        ->hasAttribute('rel', 'noopener noreferrer');

    $view->doesNotContain($post->user->name);

    $post->recommendations->each(function (Post $post) use ($view) {
        $view->contains($post->title);
    });
});

test('a given unpublished post cannot be shown to guests', function () {
    $post = Post::factory()->create();

    assertGuest()
        ->get(route('posts.show', $post))
        ->assertNotFound();
});

test('a given unpublished post cannot be shown to users', function () {
    $user = User::find(2) ?? User::factory()->create(['id' => 2]);

    $post = Post::factory()->create();

    actingAs($user)
        ->get(route('posts.show', $post))
        ->assertNotFound();
});

test('a given unpublished post can be shown to user #1', function () {
    $user = User::find(1) ?? User::factory()->create(['id' => 1]);

    $post = Post::factory()->create();

    actingAs($user)
        ->get(route('posts.show', $post))
        ->assertOk();
});
