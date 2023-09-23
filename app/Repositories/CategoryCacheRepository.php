<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoryRepositoryContract;

class CategoryCacheRepository implements CategoryRepositoryContract
{
    public function __construct(
        public CategoryRepository $repository
    ) {
    }
}
