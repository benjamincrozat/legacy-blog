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
                'amber-400', 'blue-400', 'cyan-400', 'emerald-400', 'fuchsia-400', 'gray-800', 'green-400', 'indigo-400', 'orange-400', 'pink-400', 'purple-400', 'red-400', 'rose-400', 'sky-400', 'teal-400', 'violet-400', 'yellow-400',
            ])->random(),
        ];
    }
}
