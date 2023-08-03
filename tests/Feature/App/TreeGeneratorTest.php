<?php

use App\Support\TreeGenerator;

it('works', function () {
    $tree = TreeGenerator::generate(<<<'HTML'
<h1 id="foo"><a href="#"><strong>Foo</strong></a></h1>
<h2>Bar</h2>
<p>Lorem ipsum dolor sit amet.</p>
<h3 id="baz"><a href="#">Baz</a></h3>
HTML);

    expect($tree)->toEqual([
        [
            'id' => '',
            'title' => 'Bar',
            'level' => 2,
        ],
        [
            'id' => 'baz',
            'title' => 'Baz',
            'level' => 3,
        ],
    ]);
});

it('does not crash when no heading', function () {
    $tree = TreeGenerator::generate('');

    expect($tree)->toEqual([]);
});
