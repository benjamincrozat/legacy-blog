<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
use App\Support\TableOfContentsGenerator;

class ListDealsController extends Controller
{
    public function __invoke() : View
    {
        return view('deals.index', [
            'categories' => $categories = Category::with('deals')->whereHas('deals')->orderBy('name')->get(),
            'others' => Post::inRandomOrder()->withUser()->limit(10)->get(),
            'toc' => TableOfContentsGenerator::generate(
                $categories->map(fn ($c) => "## $c->name")->join("\n\n")
            ),
        ]);
    }
}
