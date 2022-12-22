<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Short>
 */
class ShortFactory extends Factory
{
    public function definition() : array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => Str::random(5),
            'url' => fake()->url(),
            'utm_campaign' => fake()->word(),
            'utm_content' => fake()->word(),
            'utm_medium' => fake()->word(),
            'utm_source' => fake()->word(),
            'utm_term' => fake()->word(),
        ];
    }
}
