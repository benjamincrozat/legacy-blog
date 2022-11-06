<?php

namespace Database\Factories;

use App\Models\Affiliate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    public function definition() : array
    {
        return [
            'affiliate_id' => Affiliate::inRandomOrder()->value('id'),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->sentences(mt_rand(2, 3), true),
            'button' => $this->faker->sentence(),
            'start_at' => now(),
        ];
    }
}
