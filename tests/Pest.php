<?php

use Tests\TestCase;
use Illuminate\Support\Stringable;
use Illuminate\Support\Facades\Http;
use App\CommonMark\MarxdownConverter;
use App\Http\Middleware\TrackPageView;
use function Pest\Laravel\withoutVite;
use Torchlight\Middleware\RenderTorchlight;
use function Pest\Laravel\withoutMiddleware;
use NunoMaduro\LaravelMojito\InteractsWithViews;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(TestCase::class, LazilyRefreshDatabase::class, InteractsWithViews::class)
    ->beforeEach(function () {
        Http::preventStrayRequests();

        Stringable::macro(
            'marxdown',
            fn () => (new MarxdownConverter(torchlight: false))->convert($this->value)
        );

        withoutMiddleware([
            RenderTorchlight::class,
            TrackPageView::class,
        ]);

        withoutVite();
    })
    ->in('Feature');
