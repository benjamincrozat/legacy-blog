<?php

use Tests\TestCase;
use Illuminate\Support\Stringable;
use Illuminate\Support\Facades\Http;
use App\CommonMark\MarxdownConverter;
use App\Http\Middleware\TrackPageView;
use function Pest\Laravel\withoutVite;
use function Pest\Laravel\withoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(TestCase::class, DatabaseTransactions::class)
    ->beforeEach(function () {
        Http::preventStrayRequests();

        Stringable::macro(
            'marxdown',
            fn () => (new MarxdownConverter(torchlight: false))->convert($this->value)
        );

        withoutMiddleware(TrackPageView::class);

        withoutVite();
    })
    ->in('Feature');
