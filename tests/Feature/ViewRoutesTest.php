<?php

namespace Tests\Feature\App;

use Tests\TestCase;

class ViewRoutesTest extends TestCase
{
    public function test_hire_cto_route_works() : void
    {
        $this
            ->get(route('consulting.cto'))
            ->assertOk()
            ->assertViewIs('consulting.cto');
    }

    public function test_laravel_developer_for_hire_route_works() : void
    {
        $this
            ->get(route('consulting.laravel'))
            ->assertOk()
            ->assertViewIs('consulting.laravel');
    }
}
