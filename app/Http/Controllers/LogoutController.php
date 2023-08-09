<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    public function __invoke() : RedirectResponse
    {
        auth()->logout();

        return to_route('home');
    }
}
