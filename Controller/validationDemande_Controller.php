<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 27/08/2018
 * Time: 15:32
 */

require_once '../autoload.php';
require_once '../functions.php';
session_start();
if (!isset($_SESSION['member_id'])) {
   redirect( 'signin_Controller');
    exit();
}

if (isset($_GET['event_id']) && isset($_GET['part_id']) ) {

    $event_id = $_GET['event_id'];
    $part_id = $_GET['part_id'];
    $validate = new Participantlist();
    $validate->validateParticipant($part_id,$event_id);
    //rendre champ validation a 1
//    $req = $cnx ->prepare("UPDATE `participantslist` SET `validation` = :val WHERE event_id= :event AND participant_id= :part");
//    $req->execute(array(
//                'event' => $event_id,
//                'part' => $part_id,
//                'val' => 1
//            ));
    $event = new Events();
    $event = $event->findEvent($event_id)->fetch(PDO::FETCH_OBJ);
    $eventName= $event->event_name;
    $eventLocation= $event->event_location;
    $participant = new Member();
    $participant = $participant->findMemberById($part_id)->fetch(PDO::FETCH_OBJ);
    $participantName = $participant->mem_firstName;
    require_once '../sendValidationEmail.php';
    //in cremente le nb des places reservé
    $cnx=ConnexionBD::getInstance();
    $req = $cnx ->prepare("UPDATE events SET `event_nbPlaceRes` = event_nbPlaceRes + 1 WHERE event_id= :event ");
    $req->execute(array(
        'event' => $event_id
    ));

   header('location: homePage_Controller.php');
} else {
    header('location: homePage_Controller.php');
    exit();
}