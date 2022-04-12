<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /** 
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //return redirect()->route('home');// forced since we use middleware if the user is not hod will be redirected to its home
            //return redirect()->route('jatu-login');
            if(Auth::user()->role_id == '2'){
                return redirect()->route('staff');
            }elseif(Auth::user()->role_id == '3'){
                return redirect()->route('hod');
            }

            //if zitaendelea
        }

        return $next($request);
    }
}
