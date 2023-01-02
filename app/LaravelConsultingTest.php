<?php

namespace App\Http\Controllers;

use Tests\TestCase;

class LaravelConsultingTest extends TestCase
{
    public function test_it_works() : void
    {
        $this
            ->get(route('laravel-consulting'))
            ->assertOk()
            ->assertViewIs('laravel-consulting')
        ;
    }
}
