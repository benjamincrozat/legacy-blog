<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Stringable;
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

    public function latest(bool $paginated = true) : LengthAwarePaginator|Collection
    {
        $key = str('posts_latest')
            ->when(
                $paginated,
                fn (Stringable $str) => $str->append('_paginated')
            );

        return cache()->rememberForever(
            $key,
            fn () => $this->repository->latest($paginated)
        );
    }

    public function popular() : Collection
    {
        return cache()->rememberForever(
            'posts_popular',
            fn () => $this->repository->popular(),
        );
    }

    public function recommendations(int $id) : Collection
    {
        return cache()->remember(
            "post_{$id}_recommendations",
            60 * 60 * 24,
            fn () => $this->repository->recommendations($id)
        );
    }
}
