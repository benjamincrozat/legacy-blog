<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Repositories\Contracts\CategoryRepositoryContract;

class CategoryRepository implements CategoryRepositoryContract
{
    public function get(string $slug) : ?Category
    {
        return Category::where('slug', $slug)->first();
    }

    public function posts(Category $category) : LengthAwarePaginator
    {
        return $category->posts()
            ->with('categories', 'media')
            ->latest()
            ->published()
            ->paginate(21);
    }
}
