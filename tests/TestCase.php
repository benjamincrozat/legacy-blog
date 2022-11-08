<?php

namespace Tests;

use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, LazilyRefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        Http::preventStrayRequests();

        $this->withoutVite();
    }
}
