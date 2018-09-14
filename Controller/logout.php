<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 20/08/2018
 * Time: 20:55
 */
require_once '../functions.php';
if (isset($_POST['deconnect'])) {
    $email= $_COOKIE['email'];
    session_start();
    session_destroy();
    setcookie('email',$email,time()-100);
    header('location:signin_Controller.php');
    exit();
}