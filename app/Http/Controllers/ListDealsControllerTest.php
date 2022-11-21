<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use App\Models\Deal;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Collection;

class ListDealsControllerTest extends TestCase
{
    public function test_it_lists_deals_through_categories_and_has_a_valid_table_of_contents() : void
    {
        Deal::factory(10)->forAffiliate()->hasCategories()->create();

        $response = $this
            ->get(route('deals.index'))
            ->assertOk()
            ->assertViewIs('deals.index')
        ;

        $this->assertInstanceOf(Collection::class, $categories = $response->viewData('categories'));

        $categories->each(function (Category $category) use ($response) {
            $this->assertTrue(
                $response
                    ->viewData('toc')
                    ->where('id', $category->slug)
                    ->where('title', $category->name)
                    ->where('level', 2)
                    ->isNotEmpty()
            );
        });
    }

    public function test_it_lists_other_posts() : void
    {
        Post::factory(15)->create();

        $response = $this
            ->get(route('deals.index'))
            ->assertOk()
            ->assertViewIs('deals.index')
        ;

        $this->assertInstanceOf(Collection::class, $response->viewData('others'));
        $this->assertCount(10, $response->viewData('others'));
    }
}
