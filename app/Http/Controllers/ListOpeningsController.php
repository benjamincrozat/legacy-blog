<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use Illuminate\View\View;

class ListOpeningsController extends Controller
{
    public function __invoke() : View
    {
        return view('openings.index', [
            'openings' => Opening::latest()->get(),
        ]);
    }
}
