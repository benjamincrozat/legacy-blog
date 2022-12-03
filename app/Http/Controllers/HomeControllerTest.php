<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Collection;

class HomeControllerTest extends TestCase
{
    public function test_it_lists_pins_and_posts() : void
    {
        Post::factory(10)->create();

        Post::factory(10)->pinned()->create();

        $response = $this
            ->get(route('home'))
            ->assertOk()
            ->assertViewIs('home')
        ;

        $this->assertInstanceOf(Collection::class, $response->viewData('pins'));
        $this->assertCount(4, $response->viewData('pins'));
    }

    public function test_it_lists_posts() : void
    {
        Post::factory(10)->create();

        $response = $this
            ->get(route('home'))
            ->assertOk()
            ->assertViewIs('home')
        ;

        $this->assertInstanceOf(Collection::class, $response->viewData('posts'));
        $this->assertCount(10, $response->viewData('posts'));
    }
}
