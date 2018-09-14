<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 00:32
 */
$to= $email;
$subject= "Réinitialisation de mot de passe de compte Go MyCode Events";
$message="<h1 style=\" color: black;\"> Bonjour,</h1>
                           <p style=\" color: black;\"> Vous avez demandé de modifier votre mot de passe.<br>
                            Pour modifier votre mot de passe Go My Code Events, cliquez sur le lien suivant : ";
$message .= "<a href='http://localhost:63342/gomyphp/gmcEventsManager/Controller/resetPassword_Access.php?email=$email&token=$token' style=\"background: #bf152f; color: white; padding: 10px; text-decoration: none; border-radius:10px;\" > Cliquez ici </a > ";
$message.='<br><br>Ce lien expirera dans 5 minutes, assurez-vous de l’utiliser bientôt.<br> <br>
                            Cordialement,<br>L’équipe Go My Code</p>';
$headers=  'From: "Equipe Go My Code"<eyabensaid20@gmail.com>'."\n".
    'Reply-To:eyabensaid20@gmail.com'."\r\n".
    'Content-type: text/html; chaset="UTF-8"'."\n".
    'Content-Transfert-Encoding: 8bit';
if(mail($to,$subject,$message,$headers)){// mail envoyé avec success
    $SuccessMsg = '*Merci. Veuillez accéder à votre adresse e-mail pour obtenir un lien de réinitialisation du mot de passe';
    $email="";
} else {//le mail n'a pas été envoyé
    $emailErr='* erreur s\'est produit, essaye une autre fois';
}