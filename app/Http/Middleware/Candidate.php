<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Candidate
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
        if (Auth::check()) {
            $user = Auth::guard('web')->user();
            View::share('person', $user); // shares the logged in admin with all views
            return $next($request);
        }

        return redirect(route('login').'#candidate')->withErrors(['Login Required!']);
    }
}
