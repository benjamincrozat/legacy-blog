<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use Pest\Drift\Converters\CodeConverterFactory;

class PhpunitToPest extends Component
{
    public $code = '';

    public $result = '';

    protected $rules = [
        'code' => 'required|string|min:3',
    ];

    public function render() : View
    {
        return view('livewire.phpunit-to-pest');
    }

    public function migrate() : void
    {
        $this->result = (new CodeConverterFactory)
            ->codeConverter()
            ->convert($this->code);
    }

    public function again() : void
    {
        $this->code = '';
        $this->result = '';
    }
}
