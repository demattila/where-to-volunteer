<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAny
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( !(auth()->guard('web')->check() or auth()->guard('web_organization')->check()) )
        {
            return redirect('login');
        }
        return $next($request);
    }
}
