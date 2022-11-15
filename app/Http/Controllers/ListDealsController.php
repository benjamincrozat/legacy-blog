<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ListDealsController extends Controller
{
    public function __invoke(Request $request) : View
    {
        return view('deals.index', [
            'deals' => Deal::active()
                ->latest()
                ->orderByDesc('end_at')
                ->get(),
        ]);
    }
}
