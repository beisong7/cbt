<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 12/05/2020
 * Time: 8:16 AM
 */

namespace App\Services\Organization;


use App\Services\Repository\OrganizationRepository;
use Illuminate\Http\Request;
use App\Models\Organization; //class name conflict rename
use App\Models\OrganizationStaff;
use App\Traits\Utility;

class OrganizationServices extends OrganizationRepository
{
    use Utility;
    public  function currentUser(){

    }

    public function createOrganization(Request $request){
        $staff = $request->user('staff');

        $imgurl = "";
        if ($request->hasFile('image')) {
            $imageData = $request->file('image');
            $uploadResponse = $this->uploadImage($imageData, "organization/logo");

            if($uploadResponse[0]){
                $imgurl = $uploadResponse[1];
            }else{
                return back()->withErrors(['image'=>$uploadResponse[1]])->withInput($request->input());
            }
        }

        $organization = new Organization();
        $organization->uuid = $this->generateId();
        $organization->name = $request->input('name');
        $organization->email = $request->input('email');
        $organization->phone = $request->input('phone');
        $organization->image_key = $imgurl;
        $organization->public = $request->input('public')==='private'?false:true;
        $organization->address = $request->input('address');
        $organization->save();

        //link staff to organization
        $this->createJoint($organization, $staff, true, true, true, 4);



        //todo - redirect to organization details

    }

    public function get($array){
        return Organization::where([$array])->get();
    }

    public function first($uuid){
        return Organization::where('uuid', $uuid)->first();
    }

    /***
     * @param $org_id
     * @param $staff_id
     * @return bool
     * Set an organization as the current or default organization
     */
    public function setActive($org_id, $staff_id){
        //unset any existing pivot
        $this->unsetJoint($staff_id);

        $pivot = $this->userJoint($staff_id, $org_id);
        if(!empty($pivot)){
            $pivot->current = true;
            $pivot->update();
            return true;
        }
        return false;
    }

    /**
     * @param $staff_id
     *
     */
    public function unsetJoint($staff_id){
        //remove any current | avoiding situations where more than one is active-not expected to happen
        $pivots = OrganizationStaff::where('staff_id',$staff_id)->get();
        foreach ($pivots as $pivot){
            $pivot->current = false;
            $pivot->update();
        }
    }

    public function userJoint($staff_id, $organization_id){
        return OrganizationStaff::where('staff_id',$staff_id)->where('organization_id',$organization_id)->first();
    }

    public function createJoint($organization, $staff, $owner = false, $creator = false, $current = false, $who = 1){

        if($current){
            //invalidate any current organization
            $this->unsetJoint($staff->uuid);
        }
        //create owner link
        $organizationStaff = new OrganizationStaff();
        $organizationStaff->uuid = $this->generateId();
        $organizationStaff->organization_id = $organization->uuid;
        $organizationStaff->staff_id = $staff->uuid;
        $organizationStaff->active = true;
        $organizationStaff->owner = $owner;
        $organizationStaff->creator = $creator;
        $organizationStaff->current = $current;
        $organizationStaff->who = $who;
        $organizationStaff->save();
    }

    public function updateOrgToken($organization_id){
        $organization = $this->oneWhere('uuid', $organization_id);

        $organization->token = $this->genetateToken();
        $this->update($organization);
        return $organization->token;

    }
}