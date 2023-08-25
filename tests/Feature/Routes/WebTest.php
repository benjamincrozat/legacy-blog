<?php

use App\Models\User;

use function Pest\Laravel\get;
use function Pest\Laravel\actingAs;

it('redirects /admin to /admin/posts', function () {
    actingAs(User::factory()->create())
        ->get('/admin')
        ->assertRedirect('/admin/posts');
});

test('the privacy policy page is working', function () {
    get(route('privacy'))->assertOk();
});

test('the terms of service page is working', function () {
    get(route('terms'))->assertOk();
});
