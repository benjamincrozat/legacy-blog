<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Collection;

class ConsultingControllerTest extends TestCase
{
    public function test_it_lists_posts() : void
    {
        Post::factory(15)->create(['promotes_affiliate_links' => true]);
        Post::factory(15)->create(['promotes_affiliate_links' => false]);

        $response = $this
            ->get(route('consulting'))
            ->assertOk()
            ->assertViewIs('consulting')
        ;

        $this->assertInstanceOf(Collection::class, $response->viewData('posts'));
        $this->assertCount(10, $response->viewData('posts'));
    }
}
