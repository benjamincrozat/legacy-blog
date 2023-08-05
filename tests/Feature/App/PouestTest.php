<?php

use Livewire\Volt\Volt;
use function Pest\Laravel\get;

test('the page works', function () {
    get(route('pouest'))
        ->assertOk()
        ->assertViewIs('pouest')
        ->assertSeeLivewire('pouest');
});

test('the livewire component works', function () {
    $component = Volt::test('pouest');

    $component
        ->assertOk()
        ->assertSet('code', '')
        ->assertSet('result', '')
        ->set('code', '<?php namespace Tests\Unit; use PHPUnit\Framework\TestCase; class ExampleTest extends TestCase { public function test_that_true_is_true(): void { $this->assertTrue(true); } }')
        ->call('migrate')
        ->assertSet('result', fn ($result) => ! empty($result));

    $component
        ->call('again')
        ->assertSet('code', '')
        ->assertSet('result', '');
});
