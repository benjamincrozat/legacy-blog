<?php

use App\Models\Post;
use App\Models\User;
use App\Jobs\TrackPageView;

use function Pest\Laravel\get;
use function Pest\Laravel\actingAs;

use Illuminate\Support\Facades\Bus;

use function Pest\Laravel\assertGuest;

use Facades\App\Repositories\PostCacheRepository as Posts;

beforeEach(function () {
    Bus::fake(TrackPageView::class)->serializeAndRestore();
});

test('a given published post is shown correctly and the page view is tracked', function () {
    Post::factory(3)->published()->create();

    $post = Post::factory()->published()->create();

    $link = route('posts.show', $post->slug);

    /** @var NunoMaduro\LaravelMojito\ViewAssertion */
    $response = get($link)
        ->assertOk();

    $view = $response->assertView('posts.show');

    $view->has('title')->contains($post->title);

    $view->hasMeta([
        'name' => 'description',
        'content' => $post->description,
    ]);

    $view->first('link[rel="canonical"]')->hasAttribute('href', $link);

    $view
        ->first("a[href=\"https://github.com/{$post->user->github_handle}\"]")
        ->hasAttribute('target', '_blank')
        ->hasAttribute('rel', 'nofollow noopener');

    $view
        ->first("a[href=\"https://x.com/{$post->user->x_handle}\"]")
        ->hasAttribute('target', '_blank')
        ->hasAttribute('rel', 'nofollow noopener');

    Posts::recommendations($post->id)->each(function (Post $post) use ($view) {
        $view->contains($post->title);
    });

    Bus::assertDispatchedAfterResponse(TrackPageView::class);
});

test('a given published community post is shown correctly', function () {
    Post::factory(3)->published()->create();

    $post = Post::factory()->asCommunityLink()->published()->create();

    /** @var NunoMaduro\LaravelMojito\ViewAssertion */
    $view = get(route('posts.show', $post->slug))
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
        ->first("h1 a[href=\"$post->community_link\"]")
        ->hasAttribute('target', '_blank')
        ->hasAttribute('rel', 'noopener');

    $view
        ->last("a[href=\"$post->community_link\"]")
        ->hasAttribute('target', '_blank')
        ->hasAttribute('rel', 'noopener');

    $view->doesNotContain($post->user->name);

    Posts::recommendations($post->id)->each(function (Post $post) use ($view) {
        $view->contains($post->title);
    });
});

test('a given unpublished post cannot be shown to guests and the page view is not tracked', function () {
    $post = Post::factory()->create();

    assertGuest()
        ->get(route('posts.show', $post->slug))
        ->assertNotFound();

    Bus::assertNotDispatchedAfterResponse(TrackPageView::class);
});

test('a given unpublished post cannot be shown to users', function () {
    $user = User::find(2) ?? User::factory()->create(['id' => 2]);

    $post = Post::factory()->create();

    actingAs($user)
        ->get(route('posts.show', $post->slug))
        ->assertNotFound();
});
