<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        return view('home', [
            'categories' => Category::whereHas('posts')->get(),
        ]);
    }
}
