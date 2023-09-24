<?php

namespace App\Repositories\Contracts;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PostRepositoryContract
{
    public function get(string $slug) : ?Post;

    public function latest(int $page = null) : LengthAwarePaginator|Collection;

    public function popular() : Collection;

    public function recommendations(int $id) : Collection;
}
