<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CTOConsultingController extends Controller
{
    public function __invoke() : View
    {
        return view('consulting.cto');
    }
}
