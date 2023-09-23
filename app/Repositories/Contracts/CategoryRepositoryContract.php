<?php

namespace App\Repositories\Contracts;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CategoryRepositoryContract
{
    public function get(string $slug) : ?Category;

    public function posts(Category $category) : LengthAwarePaginator;
}
