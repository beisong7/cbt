<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Logic\Organization;
use App\Models\Staff;
use App\Traits\CustomMailer;
use App\Traits\WhoManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
	use WhoManager, CustomMailer;
	private $organization;
	public function __construct(Organization $organization)
    {
        $this->organization = $organization;
    }

    /**
     * Attempt to create a staff.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
    	$request->validate([
    		'owner_first_name' => ['required', 'string', 'max:255'],
            'owner_last_name' => ['required', 'string', 'max:255'],
            'owner_email' => ['required', 'string', 'email', 'max:255'],
            'owner_password' => ['required', 'string', 'min:8'],
    	]);

        DB::beginTransaction();

        $staff = Staff::create([
        	'first_name' => $request->input('owner_first_name'),
        	'last_name' => $request->input('owner_last_name'),
        	'email' => $request->input('owner_email'),
        	'password' => bcrypt($request->input('owner_password')),
        	'uuid' => (string) Str::uuid(),
        	'active' => true,
        ]);

        //send email
        $this->welcome($staff, "staff");


        Auth::guard('staff')->login($staff);

        $successful = $this->registered($request, $staff)
                        ?: redirect('/login#organization')->with('info', 'Login to proceed.');

        DB::commit();

        return $successful;
    }

    /**
     * The staff has been registered. You can perform any action after
     * successful registration here
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    public function registered(Request $request, Staff $staff)
    {
		//
    }

    public function create_organization(Request $request){
        return view('organization.pages.organization.create');
    }

    public function save_organization(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);
        $this->organization->createOrganization($request);

        return redirect()->route('staff.dashboard');


    }
}
