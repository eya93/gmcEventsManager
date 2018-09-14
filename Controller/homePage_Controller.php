<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 16:48
 */
session_start();
require_once '../functions.php';
require_once '../autoload.php';
if (!isset($_SESSION['member_id'])) {
    if(isset($_COOKIE['email'])) {
        $req = new Member();
        $response = $req->findMemberByEmail($_COOKIE['email']);
        $member = $response->fetch(PDO::FETCH_OBJ);
        $_SESSION['member_id']= $member->mem_id;
        $_SESSION['member_role']= $member->mem_role;
    }  else {
        header ('location: signin_Controller.php');
        exit();
    }
}

if (isset($_SESSION['member_id'])) {

        require_once '../View/userHomePage_View.php';

}