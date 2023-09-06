<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class CategoriesCacheCommand extends Command
{
    protected $signature = 'categories:cache';

    protected $description = 'Cache the attributes that need to be rendered in categories';

    public function handle() : void
    {
        Category::cursor()->each(function (Category $category) {
            dispatch(function () use ($category) {
                $category->presenter()->longDescription();
                $category->presenter()->content();
            });
        });

        $this->info('Categories are being cached.');
    }
}
