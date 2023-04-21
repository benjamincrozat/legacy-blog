<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class RoutesTest extends TestCase
{
    #[DataProvider('dataProvider')]
    public function test_it_works(string $route) : void
    {
        $this
            ->get(route($route))
            ->assertOk();
    }

    public static function dataProvider() : array
    {
        return [
            ['consulting.cto'],
        ];
    }
}
