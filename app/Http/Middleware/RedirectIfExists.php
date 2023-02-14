<?php

namespace App\Http\Middleware;

use App\Models\Redirect;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RedirectIfExists
{
    public function handle(Request $request, \Closure $next) : RedirectResponse
    {
        if ($redirect = Redirect::where('from', $request->path())->first()) {
            return redirect(trim($redirect->to, '/'), 301);
        }

        return $next($request);
    }
}
