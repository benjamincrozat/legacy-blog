<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Posts\Post;

class CommunityController extends Controller
{
    public function __invoke() : View
    {
        return view('community', [
            'posts' => Post::query()
                ->whereNotNull('community_link')
                ->latest()
                ->paginate(16),
        ]);
    }
}
