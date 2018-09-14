<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 20/08/2018
 * Time: 13:36
 */
require_once '../functions.php';
require_once '../autoload.php';
require_once 'rememberMe_Controller.php';
// define variables and set to empty values
$email = $pwd =$rememberMe="";
$emailErr = $pwdErr ="";
$ErrTab=[];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'forgotPassword_Validation.php';

    if (empty($emailErr)){// if email is valid communicate with BD and verify if the email already exist if not show an error msg
        try {
            $member = new Member();
            $response = $member->findMemberByEmail($email);
            if ($response->rowCount() > 0){//1 si email existe
                $token= creatToken(20);
                //update pwd-token and its expiration date
//                $response = $cnxBD->prepare( "UPDATE members
//                                                      SET pwd_token_expire= DATE_ADD(NOW(),INTERVAL  5 MINUTE ), pwd_token= :token
//                                                      WHERE mem_email = :email");
//                $response->execute(array(
//                    'token' => $token,
//                    'email' => $email
//                ));
                 $member->pwdToken($email,$token);
                //envoyer un mail de réinitiasation de mot de passe
                require_once '../sendResetPasswordEmail.php';
            } else {//email does'nt exist
                $emailErr = " * Réessayez ";
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

require('../View/forgotPassword_View.php');