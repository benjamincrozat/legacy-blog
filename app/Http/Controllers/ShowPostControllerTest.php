<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use App\Models\Post;

class ShowPostControllerTest extends TestCase
{
    public function test_it_shows_a_given_post() : void
    {
        $post = Post::factory()->create();

        $response = $this
            ->get(route('posts.show', $post))
            ->assertOk()
            ->assertViewIs('posts.show')
        ;

        $this->assertInstanceOf(Post::class, $response->viewData('post'));
    }
}
