<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opening>
 */
class OpeningFactory extends Factory
{
    public function definition() : array
    {
        $city = fake()->city();

        $remote = collect([
            'non-remote',
            'partially remote',
            'remote',
        ])->random();

        $title = collect([
            'back-end Laravel developer',
            'front-end React developer',
            'front-end Vue.js developer',
            'full-stack Laravel developer',
            'full-stack PHP developer',
            'full-stack WordPress developer',
        ])->random();

        return [
            'company' => fake()->company(),
            'description' => "$remote $title",
            'link' => fake()->url(),
        ];
    }
}
