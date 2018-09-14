<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 21/08/2018
 * Time: 18:50
 */


require_once '../autoload.php';
require_once '../functions.php';

session_start();
if (!isset($_SESSION['member_id'])) {
   redirect( 'signin_Controller');

}
if (!isset($_GET['role'])) {
    redirect ('events_View');
} else {
            $role= $_GET['role'];
            if (isset($_GET['event_id']) && ($_GET['role'] == 'edit')) {// verif  que le bouton d'édit qui a été pressé
                $id = htmlspecialchars($_GET['event_id']);
                // recupere les != valeurs de l'evnmt a partir de la BD
                $req = new Events();
                $response = $req->findEvent($id);
                $row = $response->fetch((PDO::FETCH_OBJ));
                //l'afficher ds le form
            }
            $nameErr = $start_dateErr = $end_dateErr = $locationErr = $nbPlaceErr = "";
            $id= $name= $start_date=$end_date= $location= $nbPlace="";$ErrTab=[];
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require_once 'editAddEvent_Validation.php';
                if (empty($ErrTab)) {
                    if ($_GET['role'] == 'edit') {// si c'est une modification
                        $id = htmlspecialchars($_GET['event_id']);
                        $event = new Events($id, $name, $start_date, $end_date, $location, $nbPlace);
                        $event->updateEvent($id);
                    } elseif ($_GET['role'] == 'add') {//si c'est un ajout
                        $id = htmlspecialchars($_GET['event_id']);
                        $event = new Events($id, $name, $end_date, $start_date, $location, $nbPlace);
                        $event->addEvent();
                    }
                    header( 'location: homePage_Controller.php');
                }
            }
            require_once '../View/formEvent_View.php';
    }

