<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        // Seems barebones, but I pass a variable thanks to
        // a view composer in AppServiceProvider.php.
        return view('home', [
            'posts' => Post::with('categories', 'media')->published()->orderBy('sessions_last_7_days', 'desc')->paginate(10),
        ]);
    }
}
