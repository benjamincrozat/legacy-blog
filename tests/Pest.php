<?php

use Tests\TestCase;
use PHPUnit\Framework\Assert;
use Illuminate\Support\Facades\Http;
use App\Http\Middleware\TrackPageView;

use function Pest\Laravel\withoutVite;

use NunoMaduro\LaravelMojito\ViewAssertion;

use function Pest\Laravel\withoutMiddleware;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(TestCase::class, LazilyRefreshDatabase::class)
    ->beforeEach(function () {
        Http::preventStrayRequests();

        ViewAssertion::macro('doesNotContain', function (string $string) {
            Assert::assertStringNotContainsString(
                (string) $string,
                $this->html,
                "Failed asserting that the text `{$string}` exists within `{$this->html}`."
            );

            return $this;
        });

        activity()->disableLogging();

        withoutMiddleware(TrackPageView::class);

        withoutVite();
    })
    ->in('Feature');
