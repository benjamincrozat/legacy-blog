<?php

use App\Models\Redirect;
use App\Models\Posts\Post;
use function Pest\Laravel\get;
use Illuminate\Support\Collection;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use Facades\Algolia\AlgoliaSearch\RecommendClient;

describe('CreatesRedirect trait', function () {
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
});

describe('HasLocalScopes trait', function () {
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
});

describe('HasFeedItems trait', function () {
    test('the feed works', function () {
        Post::factory(10)->create();

        // We ensure the feed doesn't have a server error.
        get('/feed')
            ->assertOk();
    });

    test('values are mapped correctly', function () {
        $posts = Post::factory(10)->create();

        $posts->each(function (Post $post) {
            $item = $post->toFeedItem();

            $link = route('posts.show', $post);

            $this->assertEquals($link, $item->id);
            $this->assertEquals($post->title, $item->title);
            $this->assertEquals($post->rendered_teaser, $item->summary);
            $this->assertEquals($post->created_at, $item->updated);
            $this->assertEquals($link, $item->link);
            $this->assertEquals($post->user->name, $item->authorName);
        });
    });
});

describe('HasRecommendations trait', function () {
    it('requests ten recommendations to Algolia and excludes the current post from recommendations', function (Collection $posts) {
        config()->set('scout.algolia.id', 'foo');
        config()->set('scout.algolia.secret', 'bar');

        $post = $posts->first();

        DG\BypassFinals::enable();

        RecommendClient::shouldReceive('getRelatedProducts')
            ->with([[
                'indexName' => config('app.env') . '_posts',
                'objectID' => "$post->id",
                'maxRecommendations' => 10,
            ]])
            ->andReturn(['results' => [[
                'hits' => array_map(fn ($id) => ['objectID' => $id], range($post->id + 1, $post->id + 10)),
            ]]])
            ->once();

        $recommendations = $post->recommendations;

        expect($recommendations)->toHaveCount(10);

        expect($recommendations->contains($post))->toBeFalse();
    });

    it("falls back to ten random recommendations when Algolia isn't available.", function (Collection $posts) {
        expect($posts->first()->recommendations)->toHaveCount(10);
    });

    it('excludes the current post from recommendations', function (Collection $posts) {
        expect(
            $posts->first()->recommendations->contains($posts->first())
        )
            ->toBeFalse();
    });
})->with([
    fn () => Post::factory(30)->create(),
]);
