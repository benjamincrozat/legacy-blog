<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class ShowCategoryController extends Controller
{
    public function __invoke(Category $category) : View
    {
        return view('categories.show', compact('category') + [
            'related' => $category->related()->orderBy('name')->get(),
            'posts' => $category->posts()->with('categories')->latest()->published()->paginate(30),
        ]);
    }
}
