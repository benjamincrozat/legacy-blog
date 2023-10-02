<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Facades\Posts;

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
