<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ShowOpeningController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Opening $opening) : View
    {
        return view('openings.show', compact('opening'));
    }
}
