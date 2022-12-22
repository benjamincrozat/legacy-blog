<?php

namespace App\Http\Controllers;

use Tests\TestCase;
use App\Models\Short;

class RedirectToUrlControllerTest extends TestCase
{
    public function test_it_redirects_to_url() : void
    {
        $short = Short::factory()->create();

        $this
            ->get(route('shorts.show', $short))
            ->assertRedirect($short->url)
        ;
    }
}
