<?php

namespace App\Http\Middleware\Assessment;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Traits\Assessment\Pending as ExistingAssessment;

class Pending
{
    use ExistingAssessment;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($request->input('action')==='ignore'){
//            session()->forget('organization_invite');
        }

        if($request->route()->getName()!=='assessment.session.ignore'){
            if (Auth::check()) {
                $assessment = $this->sessionAssessment();
                $checked = session('a_i_hook');
                if(empty($checked)){
                    if($assessment['exist']){
                        session(['a_i_hook'=>"checked"]);
                        return redirect()->route('candidate.preview.assessments', $assessment['secret']);//route that handles assessment
                    }
                }
                session()->forget('a_i_hook');
            }
        }

        return $next($request);
    }
}
