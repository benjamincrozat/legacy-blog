<?php

namespace App\Http\Controllers;

use Tests\TestCase;

class ConsultingTest extends TestCase
{
    public function test_it_works() : void
    {
        $this
            ->get(route('consulting'))
            ->assertOk()
            ->assertViewIs('consulting')
        ;
    }
}
