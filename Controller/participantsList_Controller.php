<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 20:57
 */
require_once '../autoload.php';
require_once '../functions.php';

session_start();
if (!isset($_SESSION['member_id'])) {
    redirect( 'signin_Controller');
    exit();
}
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    $list= new ParticipantList();
    $response= $list->findParticipantsOfEvent($event_id);

    if ($response->rowCount() > 0) {
        $participants = $response->fetchAll(PDO::FETCH_OBJ);
        $req= new Events();
        $response =$req->findEvent($event_id);
        $event = $response->fetch(PDO::FETCH_OBJ);

        require_once '../View/participantsList_View.php';
    } else {
        $_SESSION['msg']=" il n'y a pas de participants danc cet evenement";
        header( 'location: homePage_Controller.php');
    }

} else {
    header( 'location: homePage_Controller.php');
}