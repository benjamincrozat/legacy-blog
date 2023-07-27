<?php

use Livewire\Livewire;
use App\Http\Livewire\PHPUnitToPest;

it('works', function () {
    $component = Livewire::test(PHPUnitToPest::class);

    $component
        ->assertOk()
        ->assertViewIs('livewire.phpunit-to-pest')
        ->assertSet('code', '')
        ->assertSet('result', '')
        ->set('code', '<?php namespace Tests\Unit; use PHPUnit\Framework\TestCase; class ExampleTest extends TestCase { public function test_that_true_is_true(): void { $this->assertTrue(true); } }')
        ->call('convert')
        ->assertSet('result', fn ($result) => ! empty($result));

    $component
        ->call('again')
        ->assertSet('code', '')
        ->assertSet('result', '');
});
