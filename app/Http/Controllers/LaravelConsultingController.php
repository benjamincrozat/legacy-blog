<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LaravelConsultingController extends Controller
{
    public function __invoke() : View
    {
        return view('consulting.laravel');
    }
}
