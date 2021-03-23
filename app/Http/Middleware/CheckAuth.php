<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuth
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
        if(Auth::check()){
            // if(Auth::user()->usertype=='admin'){
            //     return redirect('/hr.dashboard');
            // }else{
            //     return redirect('/account.dashboard');
            // }
            return $next($request);
        }else{
            return redirect('/login');
        }
        
    }
}
