<?php

namespace App\Http\Middleware;

use Closure;

class RedirectUser
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
        if(auth()->guard('user')->check()){
            return redirect()->route('index');  
        }
   
        return $next($request);
    }
}
