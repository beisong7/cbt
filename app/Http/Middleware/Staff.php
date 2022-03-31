<?php

namespace App\Http\Middleware;

use App\Traits\Session;
use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class Staff
{
    use Session;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        return $next($request);

        if (Auth::guard('staff')->check()) {

            $staff = Auth::guard('staff')->user();
            View::share('person', $staff); // shares the logged in admin with all views

            //share currentOrganization with all views
            $currentOrganization = $staff->currentOrganization;
            if(!empty($currentOrganization)){
                View::share('currentOrganization', $currentOrganization);
            }

            //check if new user, redirect to intro, redirect to dashboard when done
            if(!$staff->hasSeen('welcome')){
                return redirect()->route('staff.main.tour');
            }
            //todo

            //check if invite session exist, handle and redirect
            $redirect = $this->handleOrganizationInviteData($staff);
            if($redirect[0]){
                return redirect()->route($redirect[1]);
            }

            return $next($request);

        }else{
            return redirect(route('login').'#organization')->withErrors(['Login Required!']);
        }

    }
}
