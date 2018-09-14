<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 00:30
 */
if (empty($_POST["email"])) {
    $emailErr = "* Veuillez saisir votre email";
} else {
    $email = htmlspecialchars($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "* Invalid email";
    }
}