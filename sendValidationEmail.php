<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 22:56
 */
$to= $participant->mem_email;
$subject= "validation de participation à un événement de Go MyCode";
$message="<h1 style=\" color: black;\"> Bonjour $participantName </h1>";
$message.= "<p style=\" color: black;\">".
            "Votre demande de participation à l'evenement <span style='font-weight: bold'>$eventName</span>
            ' qui se déroule à <span style='font-weight: bold'> $eventLocation </span>a ete validé.";
$message.='<br><br>Esperons que nous vous rencontrons bientôt.<br> <br>Cordialement,<br>L’équipe Go My Code</p>';
$headers=  'From: "Equipe Go My Code"<eyabensaid20@gmail.com>'."\n".
    'Reply-To:eyabensaid20@gmail.com'."\r\n".
    'Content-type: text/html; chaset="UTF-8"'."\n".
    'Content-Transfert-Encoding: 8bit';
if(mail($to,$subject,$message,$headers)){// mail envoyé avec success
    $_SESSION['msg']='la demande a été validée';
} else {//le mail n'a pas été envoyé
    $_SESSION['msg']='* erreur s\'est produit, essaye une autre fois';
}