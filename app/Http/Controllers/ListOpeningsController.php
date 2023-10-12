<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use Illuminate\View\View;

class ListOpeningsController extends Controller
{
    public function __invoke() : View
    {
        return view('jobs.index', [
            'openings' => Opening::query()
                ->latest()
                ->paginate(30),
        ]);
    }
}
