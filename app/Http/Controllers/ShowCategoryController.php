<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Facades\App\Repositories\CategoryCacheRepository as Categories;

class ShowCategoryController extends Controller
{
    public function __invoke(string $slug) : View
    {
        $category = Categories::get($slug);

        return view('categories.show', compact('category') + [
            'posts' => Categories::posts($category),
        ]);
    }
}
