<?php

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Http\Middleware\TrackPageView;

use function Pest\Laravel\withoutVite;
use function Pest\Laravel\withoutMiddleware;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(TestCase::class, LazilyRefreshDatabase::class)
    ->beforeEach(function () {
        Http::preventStrayRequests();

        config()->set('torchlight.token', null);

        withoutMiddleware(TrackPageView::class);

        withoutVite();
    })
    ->in('Feature');
