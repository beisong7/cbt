<?php

namespace App\Http\Middleware;

use App\Traits\Auth;
use Closure;
use Illuminate\Support\Facades\View;

class MultiAuth
{
    use Auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $person = $this->anyGuard();
        if(!empty($person)){
            View::share('person', $person);
            return $next($request);
        }
        return redirect()->route('home');
    }
}
