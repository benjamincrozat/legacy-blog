<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Affiliate>
 */
class AffiliateFactory extends Factory
{
    public function definition() : array
    {
        return [
            'image' => fake()->imageUrl(160, 160),
            'name' => fake()->company(),
            'slug' => fake()->slug(),
            'link' => fake()->url(),
        ];
    }
}
