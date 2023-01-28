<?php

namespace App\Http\Controllers;

use Tests\TestCase;

class CTOControllerTest extends TestCase
{
    public function test_it_work() : void
    {
        $this
            ->get(route('consulting.cto'))
            ->assertOk()
            ->assertViewIs('consulting.cto');
    }
}
