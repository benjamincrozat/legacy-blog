<?php

namespace Tests\Feature\App\Http\Controllers;

use Tests\TestCase;

class CTOConsultingControllerTest extends TestCase
{
    public function test_it_works() : void
    {
        $this
            ->get(route('consulting.cto'))
            ->assertOk()
        ;
    }
}
