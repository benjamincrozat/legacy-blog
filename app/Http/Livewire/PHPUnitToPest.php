<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use Pest\Drift\Converters\CodeConverterFactory;

class PHPUnitToPest extends Component
{
    public $code = '';

    public $result = '';

    public function render() : View
    {
        return view('livewire.phpunit-to-pest');
    }

    public function convert() : void
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
