<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Support\TableOfContentsGenerator;

class ListDealsController extends Controller
{
    public function __invoke(Request $request) : View
    {
        $categories = Category::query()->orderBy('name')->whereHas('deals')->get();

        $toc = TableOfContentsGenerator::generate($categories->map(function (Category $category) {
            return "## $category->name";
        })->join("\n\n"));

        return view('deals.index', [
            'categories' => $categories,
            'others' => Post::inRandomOrder()->withUser()->limit(10)->get(),
            'toc' => $toc,
        ]);
    }
}
