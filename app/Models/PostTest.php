<?php

namespace App\Models;

use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_it_has_a_featured_scope() : void
    {
        Post::factory()->create(['image' => 'foo']);

        Post::factory()->create();

        $this->assertCount(1, Post::featured()->get());
    }

    public function test_it_has_a_with_user_scope() : void
    {
        Post::factory()->create();

        $post = Post::withUser()->first();

        $this->assertEquals($post->user->name, $post->user_name);
        $this->assertEquals($post->user->email, $post->user_email);
    }

    public function test_it_has_a_read_time_attribute() : void
    {
        $post = Post::factory()->create(['content' => fake()->words(201, true)]);

        $this->assertEquals(2, $post->read_time);
    }

    public function test_it_feeds_the_feed() : void
    {
        Post::factory(10)->create();

        $this
            ->getJson('/feed')
            ->assertOk()
        ;
    }
}
