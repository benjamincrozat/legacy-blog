<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        return view('home', ['posts' => Post::all()]);
    }
}
