<?php

namespace Tests\Feature\App\Http\Controllers;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Collection;

class ShowPostControllerTest extends TestCase
{
    public function test_it_shows_a_given_post_and_list_recommended_posts_excluding_the_current_and_ai_ones() : void
    {
        $posts = Post::factory(30)->create(['ai' => false]);

        $response = $this
            ->get(route('posts.show', $post = $posts->first()))
            ->assertOk()
            ->assertViewIs('posts.show');

        $this->assertInstanceOf(Post::class, $response->viewData('post'));

        $recommended = $response->viewData('recommended');

        $this->assertInstanceOf(Collection::class, $recommended);
        $this->assertFalse($recommended->contains($post));

        $recommended->each(fn (Post $post) => $this->assertFalse((bool) $post->ai));
    }

    public function test_it_recommends_ai_posts_on_ai_posts() : void
    {
        $posts = Post::factory(30)->create(['ai' => true]);

        $response = $this
            ->get(route('posts.show', $post = $posts->first()))
            ->assertOk()
            ->assertViewIs('posts.show');

        $response->viewData('recommended')->each(function (Post $post) {
            $this->assertTrue((bool) $post->ai);
        });
    }
}
