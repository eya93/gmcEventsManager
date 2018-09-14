<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 00:06
 */



    // validation champ email ------------------------------------------------------>
    if (empty($_POST["email"])) {
        $emailErr = "Veuillez saisir votre email";
        array_push($ErrTab,$emailErr) ;
    } else {
        $email = htmlspecialchars($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "le format de l'email est invalide";
        }
    }
    // validation champ pwd ------------------------------------------------------>
    if (empty($_POST["pwd"])) {
        $pwdErr= "Veuillez saisir votre mot de passe";
        array_push($ErrTab,$pwdErr) ;
    } else {
        $pwd = htmlspecialchars($_POST["pwd"]);
    }

    // validation champ checkbox remember me ------------------------------------------------------>
    if (!empty($_POST["rememberMe"])) {
        $rememberMe = $_POST["rememberMe"];
    }