<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 19:31
 */
session_start();

if (isset($_SESSION['member_id'])) {
    header ( 'location: homePage_Controller.php');
} else {
    if(isset($_COOKIE['email'])) {
        $req = new Member();
        $response = $req->findMemberByEmail($_COOKIE['email']);
        $member = $response->fetch(PDO::FETCH_OBJ);
        $_SESSION['member_id']= $member->mem_id;
        $_SESSION['member_role']= $member->mem_role;
        header ( 'location: homePage_Controller.php');
    }
}