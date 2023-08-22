<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class CategoriesCacheCommand extends Command
{
    protected $signature = 'categories:cache';

    protected $description = 'Cache what needs to be computed in categories';

    public function handle() : void
    {
        Category::cursor()->each(function (Category $category) {
            $category->presenter()->longDescription();
            $category->presenter()->content();

            $this->info("Category #$category->id has been cached.");
        });

        $this->info('Categories have all been cached.');
    }
}
