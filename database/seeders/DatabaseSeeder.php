<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run() : void
    {
        Category::factory(10)
            // Users also are created in posts.
            ->hasPosts(10, ['published_at' => now()])
            ->createQuietly();

        Merchant::factory(10)->create();
    }
}
