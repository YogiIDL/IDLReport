<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLevelUser
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
        // if(Auth::user()->level != "1" || Auth::user()->level != "2"){
        //     return redirect('/home');
        // }
        // if(Auth::user()->name == "Adianta"){
        //    return redirect('/home');
        // }
        if(Auth::user()->level !== "1" && Auth::user()->level !== "2"){
           return redirect('/home');
        }
        return $next($request);
    }
}
