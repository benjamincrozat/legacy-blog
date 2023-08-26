<?php

use App\Models\Post;

use function Pest\Laravel\get;

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
