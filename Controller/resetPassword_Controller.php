<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 20/08/2018
 * Time: 15:57
 */

require_once '../functions.php';
require_once '../autoload.php';
require_once 'rememberMe_Controller.php';
 // define variables and set to empty values
$pwd = $pwdConf = $ErrMsg = "";
// when submitting check if the different fields are not empty and each field has a valid format.
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once 'resetPassword_Validation.php';
        //*******if  two are valid  ***************************************************************************
        if (empty($ErrMsg)) {
            try {//update the new value of pwd
                $hashedPwd = password_hash($pwd,PASSWORD_BCRYPT);
                $cnxBD = ConnexionBD::getInstance();
//                $req = $cnxBD->prepare("UPDATE members SET password= :pwd, pwd_token= :pwd_token WHERE mem_email = :email");
//                $req->execute(array(
//                    'pwd' => $hashedPwd,
//                    'pwd_token' => '',
//                    'email' => $email
//                ));
                $member =new Member();
                $member->updatePassword($hashedPwd,$email);
                header('location: signin_Controller.php');
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
    require_once '../View/resetPassword_View.php';
} else {
    redirect('location: signin_Controller.php');
}
