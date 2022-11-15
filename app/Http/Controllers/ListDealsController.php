<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ListDealsController extends Controller
{
    public function __invoke(Request $request) : View
    {
        return view('deals.index', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
}
