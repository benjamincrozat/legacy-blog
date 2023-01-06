<?php

namespace App\Http\Middleware;

use Tests\TestCase;
use App\Models\Redirect;

class RedirectIfExistsTest extends TestCase
{
    public function test_it_redirects() : void
    {
        $redirect = Redirect::create([
            'from' => 'foo',
            'to' => 'bar',
        ]);

        $this
            ->get($redirect->from)
            ->assertStatus(301)
            ->assertRedirect($redirect->to);
    }
}
