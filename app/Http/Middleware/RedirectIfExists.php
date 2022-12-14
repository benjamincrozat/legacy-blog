<?php

namespace App\Http\Middleware;

use App\Models\Redirect;
use Illuminate\Http\Request;

class RedirectIfExists
{
    public function handle(Request $request, \Closure $next)
    {
        if ($redirect = Redirect::where('from', $request->path())->first()) {
            return redirect(trim($redirect->to, '/'), 301);
        }

        return $next($request);
    }
}
