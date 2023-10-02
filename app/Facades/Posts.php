<?php

namespace App\Facades;

use App\Repositories\Contracts\PostRepositoryContract;

/**
 * @method static ?\App\Models\Post get(string $slug)
 * @method static \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection latest(int $page = null)
 * @method static \Illuminate\Support\Collection popular()
 * @method static \Illuminate\Support\Collection recommendations(int $id)
 *
 * @mixin \App\Repositories\Contracts\PostRepositoryContract
 */
class Posts extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor() : string
    {
        return PostRepositoryContract::class;
    }
}
