<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Collection;
use App\Repositories\Contracts\PostRepositoryContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostCacheRepository implements PostRepositoryContract
{
    public function __construct(
        public PostRepository $repository
    ) {
    }

    public function get(string $slug) : ?Post
    {
        return cache()->rememberForever(
            "post_$slug", fn () => $this->repository->get($slug)
        );
    }

    public function latest(int $page = null) : LengthAwarePaginator|Collection
    {
        $key = 'posts_latest';

        if ($page) {
            $key .= "_page_$page";
        }

        return cache()->rememberForever(
            $key,
            fn () => $this->repository->latest($page)
        );
    }

    public function popular() : Collection
    {
        return cache()->rememberForever(
            'posts_popular',
            fn () => $this->repository->popular()
        );
    }

    public function recommendations(int $id) : Collection
    {
        return cache()->rememberForever(
            "post_{$id}_recommendations",
            fn () => $this->repository->recommendations($id)
        );
    }
}
