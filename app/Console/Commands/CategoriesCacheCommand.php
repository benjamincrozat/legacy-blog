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
                cache()->forget(
                    $category->presenter()->getRenderCacheKey('long_description', $category->long_description)
                );

                $category->presenter()->longDescription();

                cache()->forget(
                    $category->presenter()->getRenderCacheKey('content', $category->content)
                );

                $category->presenter()->content();
            });
        });

        $this->info('Categories are being cached.');
    }
}
