<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class ShowCategoryController extends Controller
{
    public function __invoke(string $slug) : View
    {
        $category = cache()->rememberForever(
            "category_$slug", fn () => Category::where('slug', $slug)->firstOrFail());

        return view('categories.show', compact('category') + [
            'posts' => cache()->rememberForever("category_{$category->id}_posts", function () use ($category) {
                return $category->posts()
                    ->with('categories', 'media')
                    ->latest()
                    ->published()
                    ->paginate(21);
            }),
        ]);
    }
}
