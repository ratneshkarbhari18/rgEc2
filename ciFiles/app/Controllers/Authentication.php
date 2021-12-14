<?php

namespace App\Controllers;
use App\Models\AuthModel;
use App\Controllers\BackgroundFeatures;

class Authentication extends BaseController
{

    public function admin_login()
    {
        
        $enteredEmail = $this->request->getPost("email");
        $enteredPassword = $this->request->getPost("password");

        $session = session();

        if(filter_var($enteredEmail, FILTER_VALIDATE_EMAIL)){

            $authModel = new AuthModel();

            $userData = $authModel->where('email',$enteredEmail)->where('role','admin')->first();
            
            if ($userData) {
                
                $passwordCorrect = password_verify($enteredPassword,$userData['password']);

                if ($passwordCorrect&&$userData["role"]=="admin") {
                    
                    $newdata = [
                        "id" => $userData["id"],
                        'first_name'  => $userData['first_name'],
                        'last_name'  => $userData['last_name'],
                        'email'     => $userData['email'],
                        'role' => 'admin'
                    ];
                
                    $session->set($newdata);                

                    return json_encode(array("result"=>"success","redirectUrl"=>site_url("admin-dashboard")));

                } else {

                    return json_encode(array("result"=>"failure","reason"=>"Password Incorrect"));

                }
                
            } else {

                return json_encode(array("result"=>"failure","reason"=>"Admin User with this email not found"));

            }
            

        }else {

            return json_encode(array("result"=>"failure","reason"=>"Invalid Email"));

        }

    }

    public function update_profile()
    {
        helper("form");

        $session = session();
        $currentrole = $session->get("role");

        if ($currentrole!="customer") {
            return redirect()->to(site_url("login"));
        }

        $firstName = $this->request->getPost("first_name");
        $lastName = $this->request->getPost("last_name");
        $email = $this->request->getPost("email");

        $userId = $this->request->getPost("id");

        $authModel = new AuthModel();

        $dataToUpdate = array(
            "first_name" => $firstName,
            "last_name" => $lastName,
            "email" => $email,
            "address" => $this->request->getPost("address")
        );

        $session = session();

        $session->set($dataToUpdate);

        $updated = $authModel->update($userId,$dataToUpdate);

        return redirect()->to(site_url("profile"));

    }

    public function customer_login()
    {
        
        $enteredEmail = $this->request->getPost("email");
        $enteredPassword = $this->request->getPost("password");


        $session = session();

        if(filter_var($enteredEmail, FILTER_VALIDATE_EMAIL)){

            $authModel = new AuthModel();

            $userData = $authModel->where('email',$enteredEmail)->where('role','customer')->first();
            

            if ($userData) {
                
                $passwordCorrect = password_verify($enteredPassword,$userData['password']);

                if ($passwordCorrect&&$userData["role"]=="customer") {
                    
                    $newdata = [
                        "id" => $userData["id"],
                        'first_name'  => $userData['first_name'],
                        'last_name'  => $userData['last_name'],
                        'email'     => $userData['email'],
                        'role' => 'customer'
                    ];
                
                    $session->set($newdata);                

                    return json_encode(array("result"=>"success","redirectUrl"=>site_url()));

                } else {

                    return json_encode(array("result"=>"failure","reason"=>"Password Incorrect"));

                }
                
            } else {

                return json_encode(array("result"=>"failure","reason"=>"Customer with this email not found"));

            }
            

        }else {

            return json_encode(array("result"=>"failure","reason"=>"Invalid Email"));

        }

    }

    public function send_verification_email()
    {
        $recipientEmail = $this->request->getPost("email");
        $recipientFirstName = $this->request->getPost("first_name");
        $recipientLastName = $this->request->getPost("last_name");
        $recipientName = $recipientFirstName.' '.$recipientLastName;

        $authModel = new AuthModel();
        
        if(filter_var($recipientEmail, FILTER_VALIDATE_EMAIL)&&!($authModel->where("email",$recipientEmail)->where("role","customer")->first())){
            
            $backgroundServices = new BackgroundFeatures();
            
            $verificationCode = rand(100000,999999);

            setcookie("email_verif_code",$verificationCode,time()+600);
            setcookie("email",$recipientEmail,time()+600);
            setcookie("first_name",$recipientFirstName,time()+600);
            setcookie("last_name",$recipientLastName,time()+600);
            
            $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head> <meta name="viewport" content="width=device-width, initial-scale=1.0"/> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> <title>Verify your email address</title> <style type="text/css" rel="stylesheet" media="all"> /* Base ------------------------------ */ *:not(br):not(tr):not(html){font-family: Arial, "Helvetica Neue", Helvetica, sans-serif; -webkit-box-sizing: border-box; box-sizing: border-box;}body{width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F5F7F9; color: #0a0a0a; -webkit-text-size-adjust: none;}a{color: #414EF9;}/* Layout ------------------------------ */ .email-wrapper{width: 100%; margin: 0; padding: 0; background-color: #F5F7F9;}.email-content{width: 100%; margin: 0; padding: 0;}/* Masthead ----------------------- */ .email-masthead{padding: 25px 0; text-align: center;}.email-masthead_logo{max-width: 400px; border: 0;}.email-masthead_name{font-size: 16px; font-weight: bold; color: #839197; text-decoration: none; text-shadow: 0 1px 0 white;}/* Body ------------------------------ */ .email-body{width: 100%; margin: 0; padding: 0; border-top: 1px solid #E7EAEC; border-bottom: 1px solid #E7EAEC; background-color: #FFFFFF;}.email-body_inner{width: 570px; margin: 0 auto; padding: 0;}.email-footer{width: 570px; margin: 0 auto; padding: 0; text-align: center;}.email-footer p{color: #839197;}.body-action{width: 100%; margin: 30px auto; padding: 0; text-align: center;}.body-sub{margin-top: 25px; padding-top: 25px; border-top: 1px solid #E7EAEC;}.content-cell{padding: 35px;}.align-right{text-align: right;}/* Type ------------------------------ */ h1{margin-top: 0; color: #292E31; font-size: 19px; font-weight: bold; text-align: left;}h2{margin-top: 0; color: #292E31; font-size: 16px; font-weight: bold; text-align: left;}h3{margin-top: 0; color: #292E31; font-size: 14px; font-weight: bold; text-align: left;}p{margin-top: 0; color: #839197; font-size: 16px; line-height: 1.5em; text-align: left;}p.sub{font-size: 12px;}p.center{text-align: center;}/* Buttons ------------------------------ */ .button{display: inline-block; width: 200px; background-color: #414EF9; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 45px; text-align: center; text-decoration: none; -webkit-text-size-adjust: none; mso-hide: all;}.button--green{background-color: #28DB67;}.button--red{background-color: #FF3665;}.button--blue{background-color: #414EF9;}/*Media Queries ------------------------------ */ @media only screen and (max-width: 600px){.email-body_inner, .email-footer{width: 100% !important;}}@media only screen and (max-width: 500px){.button{width: 100% !important;}}</style></head><body> <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0"> <tr> <td align="center"> <table class="email-content" width="100%" cellpadding="0" cellspacing="0"> <tr> <td class="email-masthead"> <a class="email-masthead_name">"Ricka Gauba"</a> </td></tr><tr> <td class="email-body" width="100%"> <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0"> <tr> <td class="content-cell"> <h1>Verify your email address</h1> <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0"> <tr> <td align="center"> <div> <p>Here is your Email verification code: '.$verificationCode.'. Provide it on our website to complete email verification.</p></div></td></tr></table> <p>Thanks,<br>The Ricka Gauba Team</p><table class="body-sub"> <tr> <td> <p class="sub"></p></td></tr></table> </td></tr></table> </td></tr><tr> <td> <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0"> <tr> <td class="content-cell"> <p class="sub center"> Ricka Gauba. <br>Mumbai, India </p></td></tr></table> </td></tr></table> </td></tr></table></body></html>';
            
            $subject = "Email Verification - Ricka Gauba";

            $altBody = "Thanks for registering with us. 
            Here is your Email Verification Code : ".$verificationCode;

            $emailSent = $backgroundServices->send_email($recipientEmail,$recipientName,$subject,$body,$altBody);

            if ($emailSent) {
                return "email-sent";
            } else {
                return "email-not-sent";
            }
            

        }else {
            return "invalid-email";
        }
    }


    public function verify_email()
    {
        $enteredCode = $this->request->getPost("verification_code");
        $enteredCodeMd5 = $enteredCode;
        $savedMd5 = $_COOKIE["email_verif_code"];
        // return $enteredCodeMd5."|".$savedMd5;
        if ($enteredCodeMd5==$savedMd5) {
            return json_encode(array('result' => "success","success_url"=>site_url() ));;
        } else {
            return json_encode(array('result' => "failure", "reason"=>"Code incorrect"));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(site_url());
    }

    public function set_pwd_create_account()
    {
        $firstName = $_COOKIE["first_name"];
        $lastName = $_COOKIE["last_name"];
        $email = $_COOKIE["email"];
        $password = $this->request->getPost("password");

        $newdata = [
            'first_name'  => $firstName,
            'last_name'  => $lastName,
            'email'     => $email,
            'role' => 'customer',
            "password" => password_hash($password,PASSWORD_DEFAULT)
        ];

        $authModel = new AuthModel();

        $userCreated = $authModel->insert($newdata);

        $userData = $authModel->where("email",$email)->first();

        $newdata["id"] = $userData["id"];

        if ($userCreated) {
            
            $session = session();

            $session->set($newdata);   

            echo json_encode(array('result' => "success", "successUrl" => site_url()));
            
        } else {
            
            echo json_encode(array('result' => "failure","reason"=>"User not created"));
            
        }
                     

    }

}