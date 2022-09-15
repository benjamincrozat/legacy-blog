<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use Illuminate\Support\Collection;

class HomeControllerTest extends TestCase
{
    public function test_it_lists_posts() : void
    {
        $response = $this
            ->get(route('home'))
            ->assertOk()
            ->assertViewIs('home')
        ;

        $this->assertInstanceOf(Collection::class, $response->viewData('posts'));
        $this->assertGreaterThan(0, count($response->viewData('posts')));
    }
}
