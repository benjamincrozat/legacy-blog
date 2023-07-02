<?php

use Tests\TestCase;
use Illuminate\Support\Stringable;
use Illuminate\Support\Facades\Http;
use App\CommonMark\MarxdownConverter;
use function Pest\Laravel\withoutVite;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(TestCase::class, DatabaseTransactions::class)->in('Feature');

beforeEach(function () {
    Http::preventStrayRequests();

    withoutVite();

    Stringable::macro(
        'marxdown',
        fn () => (new MarxdownConverter(torchlight: false))->convert($this->value)
    );
});
