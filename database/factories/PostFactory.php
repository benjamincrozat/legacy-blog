<?php

namespace Database\Factories;

use App\Models\User;
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
            'slug' => fake()->slug(),
            'content' => fake()->paragraphs(5, true),
            'description' => fake()->paragraph(),
            'promotes_affiliate_links' => fake()->boolean(),
            'expand_table_of_contents' => fake()->boolean(),
        ];
    }
}
