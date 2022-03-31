<?php
    $assessment_invite = session('assessment_invite');
    if(!empty($assessment_invite)){
        try{
            $uuid = decrypt($assessment_invite['secret']);
            $assessment = \App\Models\Assessment::where('uuid', $uuid)->first();
        }catch (\Exception $e){

        }
    }

    $organization_invite = session('organization_invite');
    if(!empty($organization_invite)){
        try{
            $uuid = decrypt($organization_invite['id']);
            $message = decrypt($organization_invite['message']);
            $organization = \App\Models\Organization::where('uuid', $uuid)->first();
        }catch (\Exception $e){

        }
    }

?>

@if(!empty($assessment_invite))
    <div class="invite-notice shadow mb-4">
        <div class="text-center text-white">
            <div class="icon-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </div>
            <h5 class="mt-3">Hello Guest</h5>

            <p>You have an pending <b>Assessment</b> invite for <br> <b>{{ $assessment->title }}</b></p>

            <small>Login or Create an account as a  <b><u>Candidate</u></b>
                <span class="mobile-only"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
                to continue.
            </small>
        </div>
    </div>
@endif

@if(!empty($organization_invite))
    <div class="invite-notice shadow mb-4">
        <div class="text-center text-white">

            <div class="icon-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
            </div>
            <h5 class="mt-3">Pending Invite.</h5>

            <p>{{ $message }}</p>

            <small>Login or Create an <b><u>Organization</u></b>
                <span class="mobile-only"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg></span>
                account to continue.
            </small>

        </div>
    </div>
@endif
