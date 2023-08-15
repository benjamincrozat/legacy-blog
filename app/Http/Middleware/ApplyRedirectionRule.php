<?php

namespace App\Http\Middleware;

use App\Models\Redirect;
use Illuminate\Http\Request;

class ApplyRedirectionRule
{
    public function handle(Request $request, \Closure $next) : mixed
    {
        if ($redirect = Redirect::where('from', 'REGEXP', '^/?' . $request->path())->first()) {
            return redirect(trim($redirect->to, '/'), 301);
        }

        return $next($request);
    }
}
