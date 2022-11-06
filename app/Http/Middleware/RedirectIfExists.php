<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RedirectIfExists
{
    public function handle(Request $request, Closure $next)
    {
        if ($redirect = Redirect::where('from', $request->path())->first()) {
            return redirect(trim($redirect->to, '/'), 301);
        }

        return $next($request);
    }
}
