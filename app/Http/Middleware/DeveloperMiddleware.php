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
        $error_msg = 'Your account must have the role of developer or higher in order to use the back-end.';
        
        if(auth::check()){
            if ( Auth::user()->user_role == 2 || Auth::user()->user_role == 3 ) {
                
            return $next($request);
                
            }else {
                Auth::logout();
                return redirect()->route('login')->with('error', $error_msg);
            }
         }
         else {
            return redirect()->route('login');
         } 
    }
}
