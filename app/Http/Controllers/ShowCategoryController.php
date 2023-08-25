<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class ShowCategoryController extends Controller
{
    public function __invoke(Category $category) : View
    {
        return view('categories.show', compact('category') + [
            'posts' => $category->posts()->latest()->published()->paginate(30),
        ]);
    }
}
