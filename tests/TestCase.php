<?php

namespace Tests;

use Illuminate\View\ComponentAttributeBag;
use NunoMaduro\LaravelMojito\ViewAssertion;
use League\Config\ConfigurationBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Extension\Embed\EmbedExtension;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\CommonMarkShikiHighlighter\HighlightCodeExtension;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ConfigurableExtensionInterface;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp() : void
    {
        parent::setUp();

        $this->swap(HighlightCodeExtension::class, new class implements ExtensionInterface
        {
            public function register(EnvironmentBuilderInterface $environment) : void
            {
            }
        });

        $this->swap(EmbedExtension::class, new class implements ConfigurableExtensionInterface
        {
            public function configureSchema(ConfigurationBuilderInterface $builder) : void
            {
            }

            public function register(EnvironmentBuilderInterface $environment) : void
            {
            }
        });
    }

    protected function assertView(
        string $view,
        array $data = [],
        array $mergeData = []
    ) : ViewAssertion {
        return new ViewAssertion(view($view, array_merge([
            'attributes' => new ComponentAttributeBag,
            'slot' => '',
        ], $data), $mergeData)->render());
    }
}
