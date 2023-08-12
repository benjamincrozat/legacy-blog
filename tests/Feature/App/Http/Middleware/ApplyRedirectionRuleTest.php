<?php

use App\Models\Redirect;
use function Pest\Laravel\get;

test('middleware applies existing redirections rules', function () {
    $redirect = Redirect::create([
        'from' => '/foo',
        'to' => '/bar',
    ]);

    get($redirect->from)
        ->assertStatus(301)
        ->assertRedirect($redirect->to);
});

test('middleware does not initiate an infinite loop of redirects', function () {
    $redirect = Redirect::create([
        'from' => '/foo-bar',
        'to' => '/foo',
    ]);

    get($redirect->from)
        ->assertStatus(301)
        ->assertRedirect($redirect->to);

    get($redirect->to)
        // This route does not exist, so a 404 is to be expected.
        // If the bug was still happening, we'd have a redirect.
        ->assertNotFound();
});
