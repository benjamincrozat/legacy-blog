<?php

use App\Models\Redirect;
use function Pest\Laravel\get;

it('redirects', function () {
    $redirect = Redirect::create([
        'from' => '/foo',
        'to' => '/bar',
    ]);

    get($redirect->from)
        ->assertStatus(301)
        ->assertRedirect($redirect->to);
});
