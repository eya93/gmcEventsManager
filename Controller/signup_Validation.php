<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 00:18
 */
// validation champ nom ------------------------------------------------------>
if (empty($_POST["nom"])) {
    $nomErr="*Veuillez saisir votre nom";
    array_push($ErrTab,$nomErr) ;
} else {
    $nom = htmlspecialchars($_POST["nom"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nom)) {
        $nomErr = "*Le nom doit contenir slt des lettres ou espaces";
        array_push($ErrTab,$nomErr) ;
    }
}
// validation champ prenom ------------------------------------------------------>
if (empty($_POST["prenom"])) {
    $prenomErr="*Veuillez saisir votre prenom";
    array_push($ErrTab,$prenomErr) ;
} else {
    $prenom = htmlspecialchars($_POST["prenom"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {
        $prenomErr = "*Le prenom doit contenir slt des lettres ou espaces";
        array_push($ErrTab,$prenomErr) ;
    }
}
// validation champ tel------------------------------------------------------>
if (empty($_POST["tel"])) {
    $telErr="*Veuillez saisir votre numero de telephone";
    array_push($ErrTab,$telErr) ;
} else {
    $tel = htmlspecialchars($_POST["tel"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/[0-9]{2} [0-9]{3} [0-9]{3}/",$tel)) {
        $telErr = "*Le numero de telephone doit etre sous la forme xx xxx xxx";
        array_push($ErrTab,$telErr) ;
    }
}
// validation champ email ------------------------------------------------------>
if (empty($_POST["email"])) {
    $emailErr = "*Veuillez saisir votre email";
    array_push($ErrTab,$emailErr) ;
} else {
    $email = htmlspecialchars($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "*Le format de l'email est invalide";
        array_push($ErrTab,$emailErr);
    }
}
// validation champ pwd ------------------------------------------------------>
if (empty($_POST["pwd"])) {
    $pwdErr= "*Veuillez saisir votre mot de passe";
    array_push($ErrTab,$pwdErr) ;
} else {
    $pwd = htmlspecialchars($_POST["pwd"]);
    if (!preg_match("/[a-z]/",$pwd) || !preg_match("/[A-Z]/",$pwd) || !preg_match("/[0-9]/",$pwd)) {
        $pwdErr= "*Mot de passe doit contenir slt des lettres,au moins un chiffre et  au moins une lettre majuscule";
        array_push($ErrTab,$pwdErr) ;
    } elseif (strlen($pwd) < 8) {
        $pwdErr= "*Mot de passe doit contenir au moins 8 caractères";
        array_push($ErrTab,$pwdErr) ;
    } else {
        // validation champ pwd confirmation ------------------------------------------------------>
        if (empty($_POST['pwdConfirmation'])) {
            $pwdConfErr = "*Veuillez confirmer votre mot de passe";
            array_push($ErrTab,$pwdConfErr) ;
        } else {
            $pwdConf = htmlspecialchars($_POST['pwdConfirmation']);
            if ( (strcmp($pwd, $pwdConf) != 0) && $pwdErr == "") {
                $pwdConfErr = "*Les deux mots de passe sont différents";
                array_push($ErrTab,$pwdConfErr);
            }
        }
    }
}
