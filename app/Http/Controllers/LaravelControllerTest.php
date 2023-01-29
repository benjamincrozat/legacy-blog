<?php

namespace App\Http\Controllers;

use Tests\TestCase;

class LaravelControllerTest extends TestCase
{
    public function test_it_work() : void
    {
        $this
            ->get(route('consulting.laravel'))
            ->assertOk()
            ->assertViewIs('consulting.laravel');
    }
}
