<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Facades\Categories;

class ShowCategoryController extends Controller
{
    public function __invoke(string $slug) : View
    {
        $category = Categories::get($slug);

        abort_if(is_null($category), 404);

        return view('categories.show', compact('category') + [
            'posts' => Categories::posts($category),
        ]);
    }
}
