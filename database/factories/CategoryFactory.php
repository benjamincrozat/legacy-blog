<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public function definition() : array
    {
        return [
            'name' => ucfirst(fake()->word()),
            'slug' => fn (array $attributes) => Str::slug($attributes['name']),
            'description' => fake()->paragraph(),
            'long_description' => fake()->paragraph(),
            'content' => File::get(resource_path('markdown/benchmark.md')),
        ];
    }
}
