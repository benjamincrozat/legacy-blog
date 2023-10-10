<?php

namespace App\Http\Controllers;

use App\Facades\Posts;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        return view('home', [
            'popular' => Posts::popular(),
            'latest' => Posts::latest(),
        ]);
    }
}
