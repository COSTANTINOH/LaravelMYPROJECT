<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Staff
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
        if (!Auth::check()) {
            return redirect()->route('jatu-login');
        }
        
        if (Auth::user()->role_id == 2) {
            return $next($request);
        }        

        if (Auth::user()->role_id == 3) {
            return redirect()->route('hod');
        }

        if (Auth::user()->role_id == 4) {
            return redirect()->route('bm');
        }

        if (Auth::user()->role_id == 5) {
            return redirect()->route('hr');
        }

        if (Auth::user()->role_id == 6) {
            return redirect()->route('gm');
        }
        if (Auth::user()->role_id == 7) {
            return redirect()->route('ceo');
        }
        if (Auth::user()->role_id == 1) {
            return redirect()->route('admin');        
        }

        //the rest iffs
       
    }
}
