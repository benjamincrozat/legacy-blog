<?php

use Livewire\Livewire;
use App\Http\Livewire\PhpunitToPest;

test('the route works')
    ->get('/phpunit-to-pest')
    ->assertOk()
    ->assertViewIs('tools.phpunit-to-pest')
    ->assertSeeLivewire('phpunit-to-pest');

test('the livewire component works', function () {
    $component = Livewire::test(PhpunitToPest::class);

    $component
        ->assertOk()
        ->assertViewIs('livewire.phpunit-to-pest')
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
