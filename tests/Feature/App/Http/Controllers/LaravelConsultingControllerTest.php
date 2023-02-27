<?php

namespace Tests\Feature\App\Http\Controllers;

use Tests\TestCase;

class LaravelConsultingControllerTest extends TestCase
{
    public function test_it_works() : void
    {
        $this
            ->get(route('consulting.laravel'))
            ->assertOk()
        ;
    }
}
