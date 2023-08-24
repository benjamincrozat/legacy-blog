<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchant>
 */
class MerchantFactory extends Factory
{
    public function definition() : array
    {
        return [
            'name' => fake()->company(),
            'slug' => fake()->slug(),
            'link' => fake()->url(),
        ];
    }
}
