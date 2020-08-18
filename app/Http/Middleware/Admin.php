<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::user()->role=='Admin'){
            return $next($request);
        }
        else{
            return redirect()->back()->with('delete', 'Sorry you don\'t have access to view the requested resource');
        }
    }
}
