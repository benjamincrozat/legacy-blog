<?php

use DG\BypassFinals;
use App\Models\Posts\Post;
use Illuminate\Support\Collection;
use Facades\Algolia\AlgoliaSearch\RecommendClient;

dataset('posts', [
    fn () => Post::factory(30)->create(),
]);

it('requests ten recommendations to Algolia and excludes the current post from recommendations', function (Collection $posts) {
    config()->set('scout.algolia.id', 'foo');
    config()->set('scout.algolia.secret', 'bar');

    $post = $posts->first();

    BypassFinals::enable();

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
})->with('posts');

it("falls back to ten random recommendations when Algolia isn't available.", function (Collection $posts) {
    expect($posts->first()->recommendations)->toHaveCount(10);
})->with('posts');

it('excludes the current post from recommendations', function (Collection $posts) {
    expect(
        $posts->first()->recommendations->contains($posts->first())
    )
        ->toBeFalse();
})->with('posts');
