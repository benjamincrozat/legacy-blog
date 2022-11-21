<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use App\Models\Deal;
use App\Models\Post;
use Illuminate\Support\Collection;

class ListPostsControllerTest extends TestCase
{
    public function test_it_lists_highlighted_posts() : void
    {
        Post::factory(10)->create();

        Post::factory(10)->highlighted()->create();

        $response = $this
            ->get(route('posts.index'))
            ->assertOk()
            ->assertViewIs('posts.index')
        ;

        $this->assertInstanceOf(Collection::class, $response->viewData('highlighted'));
        $this->assertCount(4, $response->viewData('highlighted'));
    }

    public function test_it_lists_the_latest_deals() : void
    {
        Deal::factory(10)->forAffiliate()->create();

        $response = $this
            ->get(route('posts.index'))
            ->assertOk()
            ->assertViewIs('posts.index')
        ;

        $this->assertInstanceOf(Collection::class, $response->viewData('deals'));
        $this->assertCount(6, $response->viewData('deals'));
    }

    public function test_it_lists_posts() : void
    {
        Post::factory(10)->create();

        $response = $this
            ->get(route('posts.index'))
            ->assertOk()
            ->assertViewIs('posts.index')
        ;

        $this->assertInstanceOf(Collection::class, $response->viewData('posts'));
        $this->assertCount(10, $response->viewData('posts'));
    }
}
