<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Affiliate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Best>
 */
class BestFactory extends Factory
{
    public function definition() : array
    {
        return [
            'post_id' => Post::inRandomOrder()->value('id'),
            'affiliate_id' => Affiliate::inRandomOrder()->value('id'),
            'title' => collect([
                'Best at scale',
                'Best for beginners',
                'Best overall',
                'Best value',
            ])->shuffle()->first(),
            'description' => fake()->sentences(mt_rand(1, 2), true),
        ];
    }
}
