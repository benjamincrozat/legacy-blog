<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pin>
 */
class PinFactory extends Factory
{
    public function definition() : array
    {
        return [
            'post_id' => Post::inRandomOrder()->value('id'),
        ];
    }
}
