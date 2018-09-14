<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 17/08/2018
 * Time: 14:55
 */

//*********validation des inputs et ajouter le nv utilisateur à la BD********************************

require_once '../autoload.php';
require_once '../functions.php';
require_once 'rememberMe_Controller.php';
// define variables and set to empty values
$nom = $prenom = $email = $pwd = $pwdConf = $tel ="";
$nomErr = $prenomErr = $emailErr = $pwdErr = $pwdConfErr =$SuccessMsg= $telErr ="";
$ErrTab=[];

// when submitting check if the different fields are not empty and each field has a valid format.
// at the end creat an error msg for each field and push them in array

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once 'signup_Validation.php';

    if (empty($ErrTab)){// if all fields are valid communicate with BD and verify if the email already exist if not add the new user
        try {
            $member = new Member();
            $response = $member->findMemberByEmail($email);

            if ($response-> rowCount() > 0){// si email existe
                array_push($ErrTab," cet email a été dejà utilisé");
            } else {// si email n'existe pas
                //$hashedPwd = crypt($pwd);
                $hashedPwd = password_hash($pwd,PASSWORD_BCRYPT);
                $token = creatToken(20);
                $member = new Member(null,$nom, $prenom, $email, $tel, 0, $hashedPwd, 0, $token, '','');
                $member->addMember();
                // //envoi d'un mail de confirmation
                require_once '../sendConfirmationEmail.php';
            }
        } catch (PDOException $e) {
            die($e->getMessage());
          }
    }
}

require '../View/signup_View.php';
?>


