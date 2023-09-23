<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Collection;
use App\Repositories\Contracts\PostRepositoryContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostRepository implements PostRepositoryContract
{
    public function get(string $slug) : ?Post
    {
        return Post::query()
            ->where('slug', $slug)
            ->with('categories', 'media', 'user')
            ->published()
            ->first();
    }

    public function latest(bool $paginated = true) : LengthAwarePaginator|Collection
    {
        return Post::with('categories', 'media')
            ->published()
            ->latest()
            ->when(
                $paginated,
                fn ($query) => $query->paginate(21),
                fn ($query) => $query->limit(11)->get(),
            );
    }

    public function popular() : Collection
    {
        return Post::with('categories', 'media')
            ->published()
            ->orderBy('sessions_last_7_days', 'desc')
            ->limit(11)
            ->get();
    }

    public function recommendations(array $ids, int $exclude) : Collection
    {
        return Post::query()
            ->with('categories', 'media')
            ->published()
            ->whereNotIn('id', [$exclude])
            ->unless(
                empty($ids),
                fn ($query) => $query->asSequence($ids),
                fn ($query) => $query->inRandomOrder()->limit(11)
            )
            ->get();
    }
}
