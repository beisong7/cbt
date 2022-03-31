<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoggedOut
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

        if(Auth::guard('staff')->check()) {
            return redirect()->route('staff.dashboard');
        }elseif(Auth::guard('web')->check()) {
            return redirect()->route('user.dashboard');
        }elseif(Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }else{
            return $next($request);
        }


    }
}
