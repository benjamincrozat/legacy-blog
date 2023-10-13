<?php

namespace App\Http\Controllers;

use App\Facades\Posts;
use App\Models\Opening;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        return view('home', [
            'latest' => Posts::latest(),
            'openings' => Opening::latest()->limit(10)->get(),
            'popular' => Posts::popular(),
        ]);
    }
}
