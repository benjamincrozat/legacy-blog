<?php

namespace Database\Seeders;

use App\Models\Pin;
use App\Models\Post;
use App\Models\User;
use App\Models\Redirect;
use App\Models\Affiliate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run() : void
    {
        User::factory()->create([
            'name' => 'Benjamin Crozat',
            'email' => 'benjamincrozat@me.com',
        ]);

        Post::factory(50)->create();

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
