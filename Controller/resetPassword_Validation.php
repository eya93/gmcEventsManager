<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 01:15
 */
// validation champ pwd ------------------------------------------------------>
if (empty($_POST["pwd"])) {
    $ErrMsg = "*Veuillez saisir votre mot de passe";;
} else {
    $pwd = htmlspecialchars($_POST["pwd"]);
    if (!preg_match("/[a-z]/", $pwd) || !preg_match("/[A-Z]/", $pwd) || !preg_match("/[0-9]/", $pwd)) {
        $ErrMsg = "*Mot de passe doit contenir slt des lettres,au moins un chiffre et  au moins une lettre majuscule";

    } elseif (strlen($pwd) < 8) {
        $ErrMsg = "*Mot de passe doit contenir au moins 8 caractères";

    } else {
        // validation champ pwd confirmation ------------------------------------------------------>
        if (empty($_POST['pwdConfirmation'])) {
            $ErrMsg = "*Veuillez confirmer votre mot de passe";

        } else {
            $pwdConf = htmlspecialchars($_POST['pwdConfirmation']);
            if ((strcmp($pwd, $pwdConf) != 0) && $ErrMsg == "") {
                $ErrMsg = "*Les deux mots de passe sont différents";
            }
        }
    }
}