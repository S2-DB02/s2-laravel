<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class DeveloperMiddleware
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
        if(auth::check() && Auth::user()->user_role == 2){
            return $next($request);
         }
         else {
            return redirect()->route('login');
         }    }
    }
}
