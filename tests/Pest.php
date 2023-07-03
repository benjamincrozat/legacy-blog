<?php

use Tests\TestCase;
use Illuminate\Support\Stringable;
use Illuminate\Support\Facades\Http;
use App\CommonMark\MarxdownConverter;
use function Pest\Laravel\withoutVite;
use Torchlight\Middleware\RenderTorchlight;
use function Pest\Laravel\withoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(TestCase::class, DatabaseTransactions::class)->in('Feature');

beforeEach(function () {
    Http::preventStrayRequests();

    Stringable::macro(
        'marxdown',
        fn () => (new MarxdownConverter(torchlight: false))->convert($this->value)
    );

    withoutMiddleware(RenderTorchlight::class);

    withoutVite();
});
