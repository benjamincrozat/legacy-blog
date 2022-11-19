<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Collection;

class ListDealsControllerTest extends TestCase
{
    public function test_it_works() : void
    {
        Category::factory(10)->create();

        Post::factory(15)->create();

        $response = $this
            ->get(route('deals.index'))
            ->assertOk()
            ->assertViewIs('deals.index')
        ;

        $this->assertInstanceOf(Collection::class, $response->viewData('categories'));

        $this->assertInstanceOf(Collection::class, $response->viewData('others'));
        $this->assertCount(10, $response->viewData('others'));
    }
}
