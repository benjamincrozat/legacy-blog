<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class LaravelConsultingController extends Controller
{
    public function __invoke() : View
    {
        return view('laravel-consulting', [
            'posts' => Post::latest()
                ->where('promotes_affiliate_links', false)
                ->limit(10)
                ->get(),
        ]);
    }
}
