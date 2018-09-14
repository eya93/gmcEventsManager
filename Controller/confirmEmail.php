<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 19/08/2018
 * Time: 17:35
 */

require_once '../autoload.php';
require_once '../functions.php';
if (!isset($_GET['email']) || !isset($_GET['token'])) {// pas de get dans le lien
    redirect('signup_Controller');
} else {// il ya un mail et un token dans l'url
    $cnxBD = connexionBD::getInstance();
    $email= htmlspecialchars ($_GET['email']);
    $token= htmlspecialchars ($_GET['token']);

//    $req = $cnxBD->prepare( "SELECT mem_id FROM members WHERE mem_email = :email AND user_token= :token AND isConfirmedEmail= :conf");
//     $req ->execute(array(
//        'email' => $email,
//        'token' => $token,
//        'conf' => 0
//    ));

    $member= new Member();

    $response = $member->verifyUserTokenAndEmail($email,$token);
    if ($response->rowCount() > 0){//  si l'email existe avec le meme token et qu'il n'est pas activé
//        $req = $cnxBD->prepare( "UPDATE members SET isConfirmedEmail = 1, user_token= '' WHERE mem_email = :email");
//        $req->execute(array('email' => $email));
        $member->confirmationEmail($email);
        header('location: signin_Controller.php');
    } else {
        header('location: signup_Controller.php');
    }
}
