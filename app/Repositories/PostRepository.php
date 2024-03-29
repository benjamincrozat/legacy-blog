<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Collection;
use Algolia\AlgoliaSearch\RecommendClient;
use App\Repositories\Contracts\PostRepositoryContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostRepository implements PostRepositoryContract
{
    public function __construct(
        public RecommendClient $recommend
    ) {
    }

    public function get(string $slug) : ?Post
    {
        return Post::where('slug', $slug)
            ->with('categories', 'media')
            ->published(1 === auth()->id())
            ->first();
    }

    public function latest(int $page = null) : LengthAwarePaginator|Collection
    {
        /** @var LengthAwarePaginator|Collection */
        $posts = Post::with('categories', 'media')
            ->published()
            ->orderByDesc('published_at')
            ->when(
                $page,
                fn ($query) => $query->paginate(21),
                fn ($query) => $query->limit(9)->get(),
            );

        return $posts;
    }

    public function popular() : Collection
    {
        /** @var LengthAwarePaginator|Collection */
        $posts = Post::with('categories', 'media')
            ->published()
            ->orderBy('sessions_last_7_days', 'desc')
            ->limit(9)
            ->get();

        return $posts;
    }

    public function recommendations(int $id) : Collection
    {
        $ids = $this->getAlgoliaRecommendations($id)->pluck('objectID')->filter();

        return Post::with('categories', 'media')
            ->published()
            ->whereNotIn('id', [$id])
            ->when(
                $ids->isNotEmpty(),
                fn ($query) => $query->asSequence($ids),
                fn ($query) => $query->inRandomOrder()->limit(9)
            )
            ->get();
    }

    protected function getAlgoliaRecommendations(int $id) : Collection
    {
        if (! $this->algoliaEnabled()) {
            return collect();
        }

        $recommendations = cache()->remember("post_{$id}_raw_recommendations", 60 * 60 * 24, function () use ($id) {
            return collect($this->recommend->getRelatedProducts([[
                'indexName' => config('scout.prefix') . 'posts',
                'objectID' => "$id",
                'maxRecommendations' => 9,
            ]]));
        });

        return collect($recommendations['results'][0]['hits']);
    }

    protected function algoliaEnabled() : bool
    {
        return ! empty(config('scout.algolia.id')) &&
               ! empty(config('scout.algolia.secret'));
    }
}
