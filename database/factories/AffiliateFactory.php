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
            'icon' => fake()->imageUrl(96, 96),
            'screenshot' => fake()->imageUrl(1280, 720),
            'name' => fake()->company(),
            'slug' => fake()->slug(),
            'link' => fake()->url(),
            'take' => fake()->paragraph(),
            'rating' => fake()->numberBetween(1, 10),
            'annual_discount' => fake()->sentence(),
            'guarantee' => fake()->sentence(),
            'content' => fake()->paragraphs(mt_rand(2, 4), true),
            'pricing' => fake()->paragraph(),
            'key_features' => '- ' . collect(fake()->sentences(mt_rand(3, 10)))->join("\n- "),
            'pros' => '- ' . collect(fake()->sentences(mt_rand(3, 10)))->join("\n- "),
            'cons' => '- ' . collect(fake()->sentences(mt_rand(3, 10)))->join("\n- "),
            'highlight_title' => fake()->sentence(mt_rand(1, 3)),
            'highlight_text' => fake()->paragraph(),
            'ad_title' => fake()->sentence(),
            'ad_content' => fake()->paragraph(mt_rand(1, 2)),
        ];
    }
}
