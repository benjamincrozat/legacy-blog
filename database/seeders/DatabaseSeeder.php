<?php

namespace Database\Seeders;

use App\Models\Pin;
use App\Models\Post;
use App\Models\User;
use App\Models\Short;
use App\Models\Redirect;
use App\Models\Affiliate;
use App\Models\Subscriber;
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
            $post->update(['content' => '']);
            $post->affiliates()->saveMany(Affiliate::factory(mt_rand(3, 10))->make());
        });

        Redirect::factory(10)->create();

        Subscriber::factory(50)->create();

        Short::factory(10)->create();
    }
}
