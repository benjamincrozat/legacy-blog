<?php

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Http\Middleware\TrackPageView;

use function Pest\Laravel\withoutVite;
use function Pest\Laravel\withoutMiddleware;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Facades\League\CommonMark\Extension\Embed\EmbedExtension;
use Facades\Spatie\CommonMarkShikiHighlighter\HighlightCodeExtension;

uses(TestCase::class, LazilyRefreshDatabase::class)
    ->beforeEach(function () {
        HighlightCodeExtension::shouldReceive('register');
        EmbedExtension::shouldReceive('register');
        Http::preventStrayRequests();

        withoutMiddleware(TrackPageView::class);
        withoutVite();
    })
    ->in('Feature');
