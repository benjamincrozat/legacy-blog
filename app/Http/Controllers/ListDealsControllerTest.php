<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Support\Collection;

class ListDealsControllerTest extends TestCase
{
    public function test_it_works() : void
    {
        Post::factory(30)->create();

        $response = $this
            ->get(route('deals.index'))
            ->assertViewIs('deals.index')
        ;

        $this->assertInstanceOf(Collection::class, $response->viewData('categories'));

        $this->assertInstanceOf(Collection::class, $response->viewData('others'));
        $this->assertCount(10, $response->viewData('others'));
    }
}
