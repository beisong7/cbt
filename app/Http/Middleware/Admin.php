<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
        if (Auth::check()) {
            $admin = Auth::guard('admin')->user();
            if (! empty($admin)) {
                View::share('person', $admin); // shares the logged in admin with all views
                return $next($request);
            }
        }

        return redirect()->route('admin.login')->withErrors(['Login Required!']);
    }
}
