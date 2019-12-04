<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
//        dump($guard);
        if (Auth::guard($guard)->check()) {
            if ('web_organization' === $guard) {
                return redirect('/organization/dashboard');
            }
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
