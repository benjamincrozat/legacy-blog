<?php

use Livewire\Volt\Volt;

test('the pouest livewire component works', function () {
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
