<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition() : array
    {
        return [
            'user_id' => User::factory(),
            'image' => fake()->imageUrl(),
            'title' => fake()->sentence(),
            'slug' => fn ($attributes) : string => Str::slug($attributes['title']),
            'content' => File::get(resource_path('markdown/benchmark.md')),
            'description' => fake()->sentences(2, true),
            'teaser' => fake()->paragraph(),
            'promotes_affiliate_links' => fake()->boolean(),
            'sessions' => fake()->randomNumber(),
        ];
    }

    public function asCommunityLink() : static
    {
        return $this->state(fn () : array => ['community_link' => fake()->url()]);
    }
}
