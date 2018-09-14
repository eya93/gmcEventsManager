<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 00:19
 */
$to = $email;
$subject = "Bienvenu $nom sur GoMyCode Events";
$message = "<h1 style=\" color: black;\"> Bonjour $nom</h1>";
$message .=  '<p style=" color: black;"> Votre inscription a ete effectue avec succes :D.<br>';
$message .= 'Merci d\'activer votre compte en cliquant sur le lien ci-dessous <br> <br> </p>';
$message .= "<a href='http://localhost:63342/gomyphp/gmcEventsManager/Controller/confirmEmail.php?email=$email&token=$token' style=\"background: #bf152f; color: white; padding: 10px; text-decoration: none; border-radius: 10px;\">Cliquez ici</a>";
$headers=  'From: "Go My Code team"<eyabensaid20@gmail.com>'."\n".
    'Reply-To:eyabensaid20@gmail.com'."\r\n".
    'Content-type: text/html; chaset="UTF-8"'."\n".
    'Content-Transfert-Encoding: 8bit';
if(mail($to,$subject,$message,$headers)){// mail envoyé avec success
    $SuccessMsg = 'Vous etes inscrit avec succes. Vérifier votre compte, un mail a été envoyé. ';
    $nom=$prenom=$email="";
} else {//le mail n'a pas été envoyé
    array_push($ErrTab,'erreur s\'est produit, essaye une autre fois');
}