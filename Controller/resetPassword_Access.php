<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 20/08/2018
 * Time: 15:09
 */
require_once '../functions.php';
require_once '../autoload.php';
if (isset($_SESSION['member_id'])) {
    redirect ( 'Location: userHomePage_Controller');
    exit();
}
if (isset($_GET['email']) && isset($_GET['token'])) {// il ya un mail et un token dans l'url
    // recupere les valeurs de token et de mail
    $email= htmlspecialchars ($_GET['email']);
    $token= htmlspecialchars ($_GET['token']);
    $member= new Member();
    $response = $member-> resetPwdMember($email,$token);
    if ($response->rowCount() > 0){

        $req = $member->updatePwdToken($email);
      header( 'Location: resetPassword_Controller.php?email='.$email);
        exit();

    } else {//someone trying to cheat
        redirect('signin_Controller');
    }
} else {
    redirect('signin_Controller');
}