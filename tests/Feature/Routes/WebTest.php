<?php

use function Pest\Laravel\get;

it('redirects /admin to /admin/posts')
    ->get('/admin')
    ->assertRedirect('/admin/posts');

test('the privacy policy page is working', function () {
    get(route('privacy'))->assertOk();
});

test('the terms of service page is working', function () {
    get(route('terms'))->assertOk();
});
