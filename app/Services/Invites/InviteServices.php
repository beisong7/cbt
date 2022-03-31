<?php

namespace App\Services\Invites;
use App\Models\Invite;
use App\Services\Organization\OrganizationServices;
use App\Services\Repository\InviteRepository;
use App\Traits\CustomMailer;
use App\Traits\Utility;
use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: hp
 * Date: 29/05/2020
 * Time: 10:44 AM
 */
class InviteServices extends InviteRepository
{
    use CustomMailer;
    private $orgServices;
    public function __construct(OrganizationServices $services)
    {
        $this->orgServices = $services;
    }

    public function newInvite(){

    }

    public function organizationLinks($type, $organization_id, $emails=null){

        $organization = $this->orgServices->oneWhere('uuid', $organization_id);
        if(empty($organization)){
            return false;
        }

        if(empty($emails)){
            $token = $this->orgServices->updateOrgToken($organization_id);
            //check if exist for - current:true, type:organization, mode:public
            $inviteExist = Invite::where('token', $organization->token)->where('current', true)->where('type', 'organization')->where('mode', 'public')->first();
            if(!empty($inviteExist)){
                $inviteExist->current = false;
                $this->update($inviteExist);
            }

            $code = $this->generateInviteCode();
            $invite = new Invite();
            $invite->uuid = $this->generateId();
            $invite->token = $token;
            $invite->code = strtoupper($code);
            $invite->type = "organization";
            $invite->mode = $type;
            $invite->email = null;
            $invite->completed = false;
            $invite->current = true;

            $this->save($invite);

            return true;
        }else{
            //todo check that email does not already belong to organization of focus
            return true;
        }

    }

    public function generateInviteCode(){

        $code = $this->genetateToken(6)."-".$this->genetateToken(4);
        //check
        $exist = $this->oneWhere('code', $code);
        if(!empty($exist)){
            $this->generateInviteCode();
        }
        return $code;

    }

    public function setEmailToInviteComplete(){

    }

    public function bulkOrganizationInvite(Request $request, $organization_id){
        $emails = $request->input('emails');

        if(empty($emails)){return false;}


        $organization = $this->orgServices->oneWhere('uuid', $organization_id);
        if(empty($organization)){return false;}

        if(strpos($emails, ",")!== false){
            $mailList = explode(',', $emails);
            foreach ($mailList as $email){
                $this->sendSingleMailInvite(trim($email, " "), $organization->token);
            }

        }else{
            $this->sendSingleMailInvite(trim($emails, " "), $organization->token);
        }
        return true;

    }

    public function sendSingleMailInvite($email, $token){
        $code = $this->generateInviteCode();
        $invite = new Invite();
        $invite->uuid = $this->generateId();
        $invite->token = $token;
        $invite->code = strtoupper($code);
        $invite->type = "organization";
        $invite->mode = "private";
        $invite->email = $email;
        $invite->completed = false;
        $invite->current = true;

        $this->save($invite);

        $this->inviteToOrganization($invite->mode, $email, $invite);

    }






}