<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Affiliate;
use Illuminate\View\View;

class Ad extends Component
{
    public ?Affiliate $affiliate = null;

    public string $class = '';

    public bool $show = false;

    public function render() : View
    {
        return view('livewire.ad');
    }
}
