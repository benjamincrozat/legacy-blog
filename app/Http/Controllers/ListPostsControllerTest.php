<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use Illuminate\Support\Collection;

class ListPostsControllerTest extends TestCase
{
    public function test_it_lists_posts() : void
    {
        $response = $this
            ->get(route('posts.index'))
            ->assertOk()
            ->assertViewIs('posts.index')
        ;

        $this->assertInstanceOf(Collection::class, $response->viewData('posts'));
        $this->assertGreaterThan(0, count($response->viewData('posts')));
    }
}
