<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Redirect>
 */
class RedirectFactory extends Factory
{
    public function definition() : array
    {
        return [
            'from' => fake()->slug(),
            'to' => fake()->slug(),
        ];
    }
}
