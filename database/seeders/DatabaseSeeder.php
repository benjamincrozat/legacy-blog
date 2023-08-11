<?php

namespace Database\Seeders;

use App\Models\Pin;
use App\Models\Redirect;
use App\Models\Affiliate;
use App\Models\Posts\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run() : void
    {
        Post::factory(50)->create();
        Post::factory(30)->create(['community_link' => fake()->url()]);

        Pin::factory(10)->create();

        Post::where('promotes_affiliate_links', true)->get()->each(function (Post $post) {
            tap($post)
                ->update(['content' => ''])
                ->affiliates()
                ->saveMany(Affiliate::factory(mt_rand(3, 10))->create(), [
                    'position' => mt_rand(1, 10),
                    'highlight' => fake()->boolean(),
                ]);
        });

        Redirect::factory(10)->create();
    }
}
