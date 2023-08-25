<?php

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Http\Middleware\TrackPageView;

use function Pest\Laravel\withoutVite;
use function Pest\Laravel\withoutMiddleware;

use League\Config\ConfigurationBuilderInterface;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Facades\League\CommonMark\Extension\Embed\EmbedExtension;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ConfigurableExtensionInterface;
use Facades\Spatie\CommonMarkShikiHighlighter\HighlightCodeExtension;

uses(TestCase::class, LazilyRefreshDatabase::class)
    ->beforeEach(function () {
        HighlightCodeExtension::shouldReceive('register');
        app()->instance(EmbedExtension::class, new class implements ConfigurableExtensionInterface
        {
            public function configureSchema(ConfigurationBuilderInterface $builder) : void
            {
            }

            public function register(EnvironmentBuilderInterface $environment) : void
            {
            }
        });
        Http::preventStrayRequests();

        withoutMiddleware(TrackPageView::class);
        withoutVite();
    })
    ->in('Feature');
