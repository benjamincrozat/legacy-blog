<?php

namespace App\Facades;

use App\Repositories\Contracts\CategoryRepositoryContract;

/**
 * @method static ?\App\Models\Category get(string $slug)
 * @method static \Illuminate\Contracts\Pagination\LengthAwarePaginator posts(Category $category)
 *
 * @mixin \App\Repositories\Contracts\CategoryRepositoryContract
 */
class Categories extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor() : string
    {
        return CategoryRepositoryContract::class;
    }
}
