<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class ConsultingController extends Controller
{
    public function __invoke() : View
    {
        return view('consulting', [
            'posts' => Post::latest()->where('promotes_affiliate_links', false)->limit(10)->get(),
        ]);
    }
}
