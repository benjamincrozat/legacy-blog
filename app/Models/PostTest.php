<?php

namespace App\Models;

use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_it_feeds_the_feed() : void
    {
        Post::factory(10)->create();

        $this
            ->getJson('/feed')
            ->assertOk()
        ;
    }
}
