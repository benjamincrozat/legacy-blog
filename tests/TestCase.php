<?php

namespace Tests;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Illuminate\Support\Facades\Http;
use App\CommonMark\MarxdownConverter;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;

    public function setUp() : void
    {
        parent::setUp();

        Http::preventStrayRequests();

        $this->withoutVite();

        Str::macro(
            'marxdown',
            fn ($s) => (new MarxdownConverter(torchlight: false))->convert($s)
        );

        Stringable::macro(
            'marxdown',
            fn () => (new MarxdownConverter(torchlight: false))->convert($this->value)
        );
    }
}
