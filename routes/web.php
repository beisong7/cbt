<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes(['verify' => true]);
Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'loggedOut'], function () {
    Route::get('/home', "HomeController@home")->name('home');
    Route::get('/', "HomeController@home")->name('home');
});

// Route::get('login', "AuthController@loginOptions")->name('login');
Route::get('registration-success/{secret}/{uuid}/{type}', "AuthController@successDetails")->name('reg.success');
Route::get('verify-email/success/{secret}', "AuthController@verifyMailSuccess")->name('email.verification.success');

Route::get('verify-email/{uuid}/{table}', "AuthController@verifyEmail")->name('verify.email');
Route::get('resend-verify-email/{unid}', "AuthController@reVerifyEmail")->name('re.verify.email');

Route::post('organization/password-email/reset', 'Organization\LoginController@sendPasswordRequestEmail')->name('password.mail.org');
Route::get('password-email/email/{secret}/success', 'Organization\LoginController@successPasswordRequest')->name('password.email.success');
Route::get('organization/password-email/confirm', 'Organization\LoginController@confirmPasswordRequestEmail')->name('reset.staff.password');
Route::post('organization/password-update', 'Organization\LoginController@updateStaffPassword')->name('staff.password.update');

/*Route::get('candidate-login', "AuthController@candidateLogin")->name('candidate.login');
Route::get('candidate-register', "AuthController@candidateRegister")->name('candidate.register');
Route::post('candidate-login', "AuthController@loginCandidate")->name('candidate.login');
Route::post('candidate-register', "AuthController@registerCandidate")->name('candidate.register');*/

Route::get('orbit-login', "AuthController@adminLogin")->name('admin.login');
Route::post('orbit-login', "AuthController@loginAdmin")->name('admin.login');
Route::post('orbit-register', "AuthController@registerAdmin")->name('admin.register');

//organization invite route
Route::get('invites/pub/s/{code}', "InviteController@publicOrgLink")->name('organization.invite.pub');
Route::get('invites/prv/s/{code}', "InviteController@privateOrgLink")->name('organization.invite.prv');

Route::get('assess/me/{code}', "InviteController@assessmentInvite")->name('assessment.shared.link');







//global authorised routes
Route::group(['middleware'=>'multi-auth'], function () {

    //ALL AUTHORISED ROUTES - OPEN TO ALL MODEL WHEN AUTHENTICATED
    Route::post('post/img/store/{unid}', 'ImageUploadController@uploadImages')->name('uploadStore');
    Route::post('post/img/delete/{unid}', 'ImageUploadController@deleteImage')->name('uploadDelete');

    // Tour Routes
    Route::get('staff/tours/welcome', 'TourController@welcomeStaff')->name('staff.main.tour');
    //End Route
    Route::get('staff/welcome/tour/complete', 'TourController@completeTour')->name('staff.end.tour');




});

//administrator middleware routes
Route::group(['middleware'=>'admin'], function () {

});




//candidate middleware routes
Route::group(['middleware'=>['candidate', 'pending-assessment']], function () {
    Route::prefix('candidate')->group(function () {
        Route::get('dashboard', 'Candidate\DashboardController@dashboard')->name('user.dashboard');

        Route::get('engaged/assessments', 'Candidate\AssessmentController@engaged')->name('candidate.engaged.assessments');
        Route::get('available/assessments', 'Candidate\AssessmentController@available')->name('candidate.available.assessments');

        Route::get('assessment/{secret}/preview', 'Candidate\AssessmentController@previewAssessment')->name('candidate.preview.assessments');
        Route::get('assessment/take/assessment', 'Candidate\AssessmentController@takeAssessment')->name('candidate.take.assessments');

        Route::get('assessment/review/{uuid}/assessment', 'Candidate\AssessmentController@review')->name('candidate.review.assessment');
        Route::get('assessment/resume/{uuid}', 'Candidate\AssessmentController@resume')->name('candidate.assessments.resume');

        Route::post('assessment/begin/assessment', 'Candidate\AssessmentController@beginAssessment')->name('begin.assessment');
        Route::post('assessment/resume/assessment', 'Candidate\AssessmentController@resumeAssessment')->name('resume.assessment');
        Route::post('assessment/ongoing/update/engaged', 'Candidate\AssessmentController@updateOngoingEngaged')->name('update.ongoing.engaged.assessment');
        Route::post('assessment/ongoing/submit/engaged', 'Candidate\AssessmentController@submitOngoingEngaged')->name('submit.ongoing.engaged.assessment');

        Route::get('profile', 'Candidate\ProfileController@candidateProfile')->name('candidate.profile');


        Route::get('explore/organizations', 'Candidate\DashboardController@exploreOrganization')->name('explore.organizations');
        Route::get('review/completed/assessment/{secret}', 'Candidate\DashboardController@reviewCompletedAssessment')->name('review.engaged.assessment');

        //PENDING ASSESSMENT
        Route::get('assessment/pending/ignore', 'InviteController@assessmentInviteIgnore')->name('assessment.session.ignore');


    });
});

//owner/staff middleware routes
Route::group(['middleware'=>'staff'], function () {
    Route::prefix('staff')->group(function () {
        Route::get('dashboard', 'Organization\DashboardController@dashboard')->name('staff.dashboard');
        Route::get('organizations', 'Organization\DashboardController@organizations')->name('staff.organizations');
        Route::post('logout', 'Organization\LoginController@logout')->name('staff.logout');

        Route::prefix('organization')->group(function () {
            Route::get('create', 'Organization\RegistrationController@create_organization')->name('new.organization');
            Route::post('store', 'Organization\RegistrationController@save_organization')->name('store.organization');
        });

        Route::get('profile', 'Organization\ProfileController@my_profile')->name('staff.profile');
        Route::get('check/org', 'Organization\ProfileController@testMe');
        Route::get('organization/{uuid}/show', 'Organization\OrganizationController@viewOrganization')->name('show.organization');
        Route::get('organization/{uuid}/set/active', 'Organization\OrganizationController@setActive')->name('organization.set_current');
        Route::get('organization/members', 'Organization\OrganizationController@organizationMembers')->name('organization.members');

        Route::get('organization/assessments/{state}', 'Organization\AssessmentController@index')->name('organization.assessments');

        Route::get('organization/engaged/assessments/', 'Organization\AssessmentController@engaged')->name('organization.assessments.engaged');
        Route::get('organization/submitted/assessments/{uuid}', 'Organization\AssessmentController@submissions')->name('organization.assessments.submission');

        Route::get('organization/assessment/reveal/{key}/{uuid}', 'Organization\AssessmentController@reveal')->name('assessment.reveal');

        Route::get('organization/assessment/create', 'Organization\AssessmentController@create')->name('organization.create.assessments');
        Route::post('organization/assessment/store', 'Organization\AssessmentController@store')->name('organization.store.assessments');
        Route::post('organization/assessment/update', 'Organization\AssessmentController@updateAssessment')->name('organization.update.assessments');
        Route::post('organization/ass/publish', 'Organization\AssessmentController@publish')->name('organization.publish.assessments');





        Route::get('organization/assessment/{uuid}/show', 'Organization\AssessmentController@show')->name('organization.assessment.show');
        Route::get('organization/assessment/{uuid}/edit', 'Organization\AssessmentController@edit')->name('organization.assessment.edit');
        Route::get('organization/assessment/{uuid}/preview', 'Organization\AssessmentController@preview')->name('organization.assessment.preview');
        Route::post('organization/get/assessment/shared-link', 'Organization\AssessmentController@sharedLinkToggle')->name('assessment.gen.public_key');
        Route::post('assessment/save/question/{uuid}/show', 'Organization\AssessmentController@saveQuestion')->name('assessment.question.save');
        Route::post('assessment/save/bulk/question/{uuid}/show', 'Organization\AssessmentController@saveBulkQuestion')->name('assessment.question.bulk.save');

        Route::post('organization/generate/invite', 'Organization\OrganizationController@genInviteLink')->name('organization.gen.invite');
        Route::post('organization/bulk-email/invite/{secrete}', 'Organization\OrganizationController@bulkInvite')->name('organization.invite.bulk');

        Route::get('my-requests/index', 'TenderController@staffRequests')->name('staff.tenders');
        Route::get('organization-requests/index', 'TenderController@organizationRequests')->name('organization.tenders');

        Route::get('organization/invite/accept/{uuid}/{secret}', 'Organization\OrganizationController@acceptInvite')->name('organization.accept.invite');
        Route::get('organization/invite/reject/{uuid}/{secret}', 'Organization\OrganizationController@rejectInvite')->name('organization.reject.invite');

        Route::get('user/invite/accept/{uuid}/{secret}', 'Organization\StaffServiceController@acceptInvite')->name('request.accept.invite');
        Route::get('user/invite/reject/{uuid}/{secret}', 'Organization\StaffServiceController@rejectInvite')->name('request.reject.invite');

        Route::get('assessment/get/template', 'AssessmentController@exportQuestionTemplate')->name('assessment.excel.template');
        Route::post('assessment/pop/question/{uuid}', 'Organization\AssessmentController@removeQuestion')->name('delete.question');
        Route::post('assessment/manage/question/{uuid}', 'Organization\AssessmentController@editQuestion')->name('edit.question');
        Route::post('assessment/manage/update/question', 'Organization\AssessmentController@updateQuestion')->name('assessment.update.question');

    });

});


//todo - secure route
Route::get('theme/switch/{name}', 'ThemeController@switchTheme')->name('switch.theme');

//dev routes
Route::get('all-sessions', function (\Illuminate\Http\Request $request){
    return $request->session()->all();
});