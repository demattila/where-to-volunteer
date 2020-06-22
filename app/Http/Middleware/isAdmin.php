<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
        if(auth()->guard('web_organization')->check()){
            return redirect('/');
        }
        elseif(auth()->guard('web')->check()){
            if(!auth()->guard('web')->user()->isAdmin()){
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
        return $next($request);
    }
}