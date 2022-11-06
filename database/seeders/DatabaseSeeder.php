<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Banner;
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

        Affiliate::factory(10)->create();

        Banner::factory(10)->create();
    }
}
