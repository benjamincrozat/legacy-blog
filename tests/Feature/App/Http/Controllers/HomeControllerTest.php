<?php

namespace Tests\Feature\App\Http\Controllers;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

class HomeControllerTest extends TestCase
{
    public function test_it_lists_pins() : void
    {
        Post::factory(10)->pinned()->create(['ai' => false]);

        $response = $this
            ->get(route('home'))
            ->assertOk()
            ->assertViewIs('home');

        $this->assertInstanceOf(Collection::class, $response->viewData('pins'));
        $this->assertCount(4, $response->viewData('pins'));
    }

    public function test_it_lists_popular_posts() : void
    {
        Post::factory(10)->create(['ai' => false]);

        $response = $this
            ->get(route('home'))
            ->assertOk()
            ->assertViewIs('home');

        $this->assertInstanceOf(Collection::class, $response->viewData('popular'));
        $this->assertCount(6, $response->viewData('popular'));
    }

    public function test_it_lists_posts() : void
    {
        Post::factory(10)->create(['ai' => false]);
        Post::factory(10)->create(['ai' => true]);

        $response = $this
            ->get(route('home'))
            ->assertOk()
            ->assertViewIs('home');

        $this->assertInstanceOf(Paginator::class, $response->viewData('posts'));
        $this->assertCount(10, $response->viewData('posts'));
    }

    public function test_it_lists_ai_posts() : void
    {
        Post::factory(10)->create(['ai' => true]);
        Post::factory(10)->create(['ai' => false]);

        $response = $this
            ->get(route('home'))
            ->assertOk()
            ->assertViewIs('home');

        $this->assertInstanceOf(Paginator::class, $response->viewData('ai'));
        $this->assertCount(10, $response->viewData('ai'));
    }
}
