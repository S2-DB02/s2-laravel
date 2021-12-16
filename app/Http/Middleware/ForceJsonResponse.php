<?php

namespace App\Http\Middleware;
use Illuminate\Http\Exceptions\HttpResponseException;
use Closure;

class ForceJsonResponse
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
        if (url()->current() == config('app.externalconnection')."/api/login")
        {
            $request->headers->set('Accept', 'application/json');
            //hrow new HttpResponseException(back()->withInput()->with('errors',  $request));
        }
        return $next($request);

    }
}
