<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class IsLoggedIn
{
    public function handle(Request $request, Closure $next)
    {
        if (isset(Auth::user()->id)) {
            return redirect()->back();
        }

        return $next($request);
    }
}
