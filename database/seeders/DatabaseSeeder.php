<?php

namespace Database\Seeders;

use App\Models\Pin;
use App\Models\Post;
use App\Models\User;
use App\Models\Redirect;
use App\Models\Affiliate;
use App\Models\Subscriber;
use App\Models\BestProduct;
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

        Affiliate::factory(10)->create();

        BestProduct::factory(100)->create();

        Redirect::factory(10)->create();

        Subscriber::factory(50)->create();
    }
}
