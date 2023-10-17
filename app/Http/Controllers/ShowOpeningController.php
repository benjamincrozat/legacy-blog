<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use Illuminate\View\View;

class ShowOpeningController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Opening $opening) : View
    {
        return view('openings.show', compact('opening') + [
            'recommendations' => Opening::inRandomOrder()->whereNotIn('id', [$opening->id])->limit(10)->get(),
        ]);
    }
}
