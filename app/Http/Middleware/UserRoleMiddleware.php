<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserRoleMiddleware
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
        if(Auth::user()->user_role=='user'){
            return redirect('dashbord');
        }
        if(Auth::user()->user_role=='visitor'){
            return redirect('/');
        }
        return $next($request);
    }
}
