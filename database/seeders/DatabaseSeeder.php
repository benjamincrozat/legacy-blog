<?php

namespace Database\Seeders;

use App\Models\Opening;
use App\Models\Category;
use App\Models\Merchant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run() : void
    {
        Category::factory(10)
            // Users are also created in posts.
            ->hasPosts(10, [
                'published_at' => fake()->dateTimeBetween('-1 month'),
                'community_link' => fn () => collect([null, null, fake()->url()])->random(),
            ])
            ->createQuietly();

        Merchant::factory(10)->create();

        Opening::factory(10)->create();
    }
}
