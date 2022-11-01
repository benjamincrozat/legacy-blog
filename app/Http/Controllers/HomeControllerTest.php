<?php

namespace App\Http\Controllers;

use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function test_it_works() : void
    {
        $this
            ->get(route('home'))
            ->assertViewIs('home')
        ;
    }
}
