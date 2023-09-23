<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Repositories\Contracts\CategoryRepositoryContract;

class CategoryCacheRepository implements CategoryRepositoryContract
{
    public function __construct(
        public CategoryRepository $repository
    ) {
    }

    public function get(string $slug) : ?Category
    {
        return cache()->rememberForever(
            "category_$slug",
            fn () => Category::where('slug', $slug)->first()
        );
    }

    public function posts(Category $category) : LengthAwarePaginator
    {
        return cache()->rememberForever(
            "category_{$category->id}_posts",
            fn () => $this->repository->posts($category)
        );
    }
}
