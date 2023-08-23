<?php

use App\Models\User;

test('description is rendered and cached after saving', function () {
    $model = User::factory()->create();

    expect(cache()->has(
        'User.1.description.' . sha1($model->description)
    ))->toBeTrue();
});
