<?php

namespace Database\Factories;

use App\Models\Deal;
use App\Models\Category;
use App\Models\Affiliate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deal>
 */
class DealFactory extends Factory
{
    public function definition() : array
    {
        return [
            'affiliate_id' => Affiliate::inRandomOrder()->value('id'),
            'image' => fake()->imageUrl(160, 160),
            'content' => $this->faker->sentences(mt_rand(2, 3), true),
            'button' => $this->faker->sentence(),
            'start_at' => now(),
        ];
    }

    public function withCategory() : static
    {
        return $this->afterCreating(function (Deal $deal) {
            $deal->categories()->attach(Category::inRandomOrder()->value('id'));
        });
    }
}
