<?php

use function Pest\Laravel\get;

test('the privacy policy page is working', function () {
    get(route('privacy'))->assertOk();
});

test('the media kit page is working', function () {
    get(route('media-kit'))->assertOk();
});

test('the job offers creation page is working', function () {
    get(route('openings.create'))->assertOk();
});

test('the sponsors page is working', function () {
    get(route('sponsors'))->assertOk();
});

test('the terms of service page is working', function () {
    get(route('terms'))->assertOk();
});
