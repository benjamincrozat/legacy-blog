<?php

use App\Models\Post;
use Algolia\AlgoliaSearch\RecommendClient;
use Algolia\AlgoliaSearch\Config\RecommendConfig;
use Algolia\AlgoliaSearch\RetryStrategy\ApiWrapperInterface;

it('requests ten published recommendations to Algolia and excludes the current published post', function () {
    config()->set('scout.driver', 'algolia');

    $posts = Post::factory(10)->published()->create();

    $post = Post::factory()->published()->create();

    $api = new class($posts->pluck('id')->toArray()) implements ApiWrapperInterface
    {
        public function __construct(
            protected array $ids
        ) {
        }

        public function read($method, $path, $requestOptions = [], $defaultRequestOptions = [])
        {
        }

        public function write($method, $path, $data = [], $requestOptions = [], $defaultRequestOptions = [])
        {
            return $this->ids;
        }

        public function send($method, $path, $requestOptions = [], $hosts = null)
        {
        }
    };

    $config = RecommendConfig::create(
        config('scout.algolia.id'),
        config('scout.algolia.secret')
    );

    $this->swap(RecommendClient::class, new RecommendClient($api, $config));

    expect($post->recommendations)->toHaveCount(10);
    expect($post->recommendations->pluck('id'))->not->toContain($post->id);
});

it("falls back to ten random published recommendations when Algolia isn't available.", function () {
    Post::factory(10)->published()->create();

    $post = Post::factory()->published()->create();

    expect(function () use ($post) {
        $post->recommendations->ensure(Post::class);
    })->not->toThrow(UnexpectedValueException::class);

    expect($post->recommendations)->toHaveCount(10);
});

it('excludes the current published post from recommendations', function () {
    Post::factory(10)->published()->create();

    $post = Post::factory()->published()->create();

    expect($post->recommendations->contains($post))->toBeFalse();
});
