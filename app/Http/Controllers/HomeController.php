<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Facades\App\Repositories\PostCacheRepository;

class HomeController extends Controller
{
    public function __invoke() : View
    {
        return view('home', [
            'popular' => PostCacheRepository::popular(),
            'latest' => PostCacheRepository::latest(),
        ]);
    }
}
