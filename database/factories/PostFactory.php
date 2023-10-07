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
            'title' => fake()->sentence(),
            'slug' => fn ($attributes) : string => Str::slug($attributes['title']),
            'content' => File::get(resource_path('markdown/benchmark.md')),
            'description' => fake()->sentences(2, true),
            'teaser' => fake()->paragraph(),
            'commercial' => fake()->boolean(),
            'sessions_last_7_days' => fake()->randomNumber(),
            'sessions_last_30_days' => fake()->randomNumber(),
        ];
    }

    public function published() : static
    {
        return $this->state(fn () : array => ['published_at' => now()]);
    }

    public function asCommunityLink() : static
    {
        return $this->state(fn () : array => ['community_link' => fake()->url()]);
    }
}
