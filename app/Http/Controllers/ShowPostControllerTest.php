<?php

namespace App\Http\Controllers;

use App\Post;
use Tests\TestCase;

class ShowPostControllerTest extends TestCase
{
    public function test_it_shows_a_given_post() : void
    {
        $response = $this
            ->get(route('posts.show', 'what-is-laravel'))
            ->assertOk()
            ->assertViewIs('posts.show')
        ;

        $this->assertInstanceOf(Post::class, $response->viewData('post'));
    }
}
