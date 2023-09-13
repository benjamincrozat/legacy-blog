<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public function definition() : array
    {
        return [
            'name' => ucfirst(fake()->unique()->word()),
            'slug' => fn (array $attributes) : string => Str::slug($attributes['name']),
            'description' => fake()->paragraph(),
            'primary_color' => collect([
                '#ff0000', '#00ff00', '#0000ff',
            ])->random(),
        ];
    }
}
