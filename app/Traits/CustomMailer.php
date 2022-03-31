<?php

namespace App\Traits;

trait CustomMailer{
    use VerifyEmail, Registration;

    public function prepareMail($emailType, $user=null, $table=null){
        if($emailType==='email-validation'){
            $this->emailValidationMail($user, $table);
        }

        if($emailType==='password-reset'){
            $this->passwordResetMail($user);
        }
    }

    public function passwordResetMail($user){
        $view = view('email.reset_password')
            ->with("email", $user->email)
            ->with("token", $this->signUrl('reset.staff.password', ['uuid'=> encrypt($user->uuid), 'token'=>$user->token]));

        $this->sendMails($user->email, $view, 'Evalnode - Password Reset');
    }

    public function inviteToOrganization($mode, $email, $invite){
        if(!empty($invite->organization)){
            $view = view('email.invite')->with(['invite'=>$invite]);
            $this->sendMails($email, $view, $invite->organization->name." sent you an invite");
        }
    }

    public function emailValidationMail($user, $table){

        $view = view('email.verify_email')
            ->with("user", $user->email)
            ->with("signed", $this->signUrl('verify.email', ['uuid'=> encrypt($user->uuid), 'table'=>encrypt($table)]));

        $this->sendMails($user->email, $view, 'Evalnode - Verify Email');
    }

    public function welcome($user, $type = null){
        $template = "email.welcomeStaff";
        if($type==="candidate"){
            $template = "email.welcomeStudent";
        }
        if($type==="staff"){
            $template = "email.welcomeStaff";
        }
        $view = view($template)
            ->with("user", $user)
            ->with("token", encrypt($user->unid));
        $this->sendMails($user->email, $view, 'Welcome to Evalnode');
    }

    public function sendMails($mail, $htmlContent, $title){

        $to = $mail;
        $sender = "noreply@evalnode.com";

        $separator = md5(time());
        $eol = "\r\n";

        $subject = $title;

        $fromMail = "Evalnode <$sender>";

        $headersMail = '';

        $headersMail .= "Reply-To:" . $fromMail . "\r\n";
        $headersMail .= "Return-Path: ". $fromMail ."\r\n";
        $headersMail .= 'From: ' . $fromMail . "\r\n";
        $headersMail .= "Organization: SketAPP \r\n";

        $headersMail .= 'MIME-Version: 1.0' . "\r\n";

        $headersMail .= "X-Priority: 3\r\n";
        $headersMail .= "X-Mailer: PHP". phpversion() ."\r\n" ;
        $headersMail .=  "Content-Type: text/html; charset=ISO-8859-1; boundary=\"" . $separator . "\"" . $eol;
//        $headersMail .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";

        $headersMail .= 'Content-Transfer-Encoding: 7bit' . "\r\n";



//        @mail($to,$subject, $htmlContent, $headersMail, $sender);
        @mail($to,$subject,$htmlContent,$headersMail, "-f ". $sender);

    }
}