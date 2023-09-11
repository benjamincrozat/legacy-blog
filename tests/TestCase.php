<?php

namespace Tests;

use Illuminate\View\ComponentAttributeBag;
use NunoMaduro\LaravelMojito\ViewAssertion;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function assertView(
        string $view,
        array $data = [],
        array $mergeData = []
    ) : ViewAssertion {
        return new ViewAssertion(view($view, array_merge([
            'attributes' => new ComponentAttributeBag,
            'slot' => '',
        ], $data), $mergeData)->render());
    }
}
