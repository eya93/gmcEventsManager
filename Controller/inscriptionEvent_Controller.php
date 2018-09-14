<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 26/08/2018
 * Time: 12:03
 */
require_once '../autoload.php';

session_start();
if (!isset($_SESSION['member_id'])) {
    redirect ( 'signin_Controller');

}
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    $part_id = $_SESSION['member_id'];
    //verif s'il existe ou nn

        $myEvent = new Events();
        $response = $myEvent->findEvent($event_id);
        $event = $response->fetch(PDO::FETCH_OBJ);
        if (($event->event_nbPlaceRes) ==  ($event->event_nbPlace)) {
            $_SESSION['msg']='cet evenement est compltet';
        } else  {
                $exist_part = new ParticipantList();
               $req=  $exist_part->findParticipant($part_id,$event_id);
            if ($req->rowCount() > 0 ){//mem existe
                $row= $req->fetch(PDO::FETCH_OBJ);
                if ($row->validation) {// son demande valide
                    $_SESSION['msg']='vous etes déja inscrit dans cet evenement';
                } else { // demande pas encore xvalidée
                    $_SESSION['msg']='votre demande est déja envoyée';
                }
            } else {//mail n'existe pas -> ajout

                $member = new ParticipantList();
                $member->newParticipant($part_id,$event_id);
                $_SESSION['msg']='votre demande de participation a été envoyée';
            }
        }
        header( 'location: homePage_Controller.php');

} else {
    header( 'location: homePage_Controller.php');
    exit();
}
    ?>


