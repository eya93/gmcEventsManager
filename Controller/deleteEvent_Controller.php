<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 21/08/2018
 * Time: 18:36
 */
require_once '../autoload.php';
require_once '../functions.php';
session_start();
if (!isset($_SESSION['member_id'])) {
    redirect ( 'signin_Controller');
exit();
}
if (isset($_GET['event_id'])) {
    $id=htmlentities($_GET['event_id']);
    $event = new Events();
    $event->deleteEvent($id);
}

header ('location:homePage_Controller.php');

exit();

