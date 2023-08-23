<?php

use App\Models\User;

test('description is rendered and cached after saving', function () {
    $user = User::factory()->create();

    expect(cache()->has(
        "User.$user->id.description." . sha1($user->description)
    ))->toBeTrue();
});
