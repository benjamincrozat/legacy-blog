<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Collection;

class ShowPostControllerTest extends TestCase
{
    public function test_it_shows_a_given_post_and_list_other_posts_to_read_excluding_the_current_one() : void
    {
        $posts = Post::factory(30)->create();

        $response = $this
            ->get(route('posts.show', $post = $posts->first()))
            ->assertOk()
            ->assertViewIs('posts.show');

        $this->assertInstanceOf(Post::class, $response->viewData('post'));

        $this->assertInstanceOf(Collection::class, $response->viewData('others'));
        $this->assertFalse($response->viewData('others')->contains($post));
    }
}
