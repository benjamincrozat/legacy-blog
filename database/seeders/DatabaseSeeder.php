<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run() : void
    {
        User::factory()->create([
            'name' => 'Benjamin Crozat',
            'email' => 'benjamincrozat@me.com',
        ]);

        \App\Post::all()->reverse()->each(function (\App\Post $post) {
            \App\Models\Post::create([
                'user_id' => 1,
                'image' => $post->image,
                'title' => $post->title,
                'slug' => $post->slug,
                'content' => $post->content,
                'description' => $post->description,
                'promotes_affiliate_links' => $post->hideBanners,
                'created_at' => $post->getPublishedAtDate(),
                'modified_at' => $post->getModifiedAtDate(),
            ]);
        });
    }
}
