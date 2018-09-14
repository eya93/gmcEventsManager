<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 17/08/2018
 * Time: 12:14
 */
require_once '../autoload.php';
require_once '../functions.php';
require_once 'rememberMe_Controller.php';
$email = $pwd =$rememberMe="";
$emailErr = $pwdErr ="";
$ErrTab=[];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'signin_Validation.php';
    //*******if all fields are valid format Verif existance of the email and password is correct***************************************************************************
    if (empty($ErrTab)){
        try {//1// vf que l'email n'existe pas
            $member = new Member();
            $response= $member->findMemberByEmail($email);
            if ($response-> rowCount() > 0){//1 si email existe
                // verif password
                $member= $response->fetch(PDO::FETCH_OBJ);
                if (password_verify($pwd,$member->password)){//2 pwd correcte
                    if ($member->isConfirmedEmail == 0 ) { // 3 cet email n'est pas activé
                        array_push($ErrTab,"Verifiez votre compte email. Votre compte n'est pas validé");
                    } else { //3 cet email est activé
                            if (isset($_POST['rememberMe'])) {// if remember me checkbox is valid than set cookie
                                setcookie('email',$email,time()+60*60*24*30);
                            }
                             $_SESSION['member_id']= $member->mem_id;
                             $_SESSION['member_role']= $member->mem_role;
                             header('location: homePage_Controller.php');
                             exit();
                    }
                } else {//2pwd incorrect
                    array_push($ErrTab,"Mot de passe incorrect");
                }
            } else {//1 si email n'existe pas
                array_push($ErrTab,"Vous n'etes pas inscrit");
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
require ('../View/signin_View.php');
?>
