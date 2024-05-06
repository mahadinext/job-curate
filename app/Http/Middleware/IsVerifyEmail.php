<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->email_verified_at === null) {
            auth()->logout();
            Log::error("Email is not verified");
            return redirect()->route('js-signin-page')
                    ->with('signinErrorMessage', 'You need to confirm your account. We have sent you an activation link, please check your email.');
        }

        return $next($request);
    }
}
