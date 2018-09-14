<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 10/09/2018
 * Time: 12:31
 */
session_start();
if ($_SESSION['member_role'] == 1){
    ?>
    <td style="padding: 10px;">

        <a href="../Controller/deleteEvent_Controller.php?event_id=<?= $event->event_id;?>" data-toggle="tooltip" title="supprimer l'événement"><i style="color: #bf152f;" class="fas fa-eraser fa-lg" ></i></a>
    </td>
    <td style="padding: 10px;">
        <a href="../Controller/editAddEvent_Controller.php?role=edit&event_id=<?= $event->event_id;?>" data-toggle="tooltip" title="modifier l'événement"><i style="color: #bf152f;" class="fas fa-edit fa-lg"></i></a>
    </td>
    <?php
}
?>
    <td style="padding: 10px;">
        <a href="../Controller/participantsList_Controller.php?event_id=<?= $event->event_id;?>" data-toggle="tooltip" title="liste des participants à cet événement"><i style="color: #bf152f;" class="fas fa-list-ol fa-lg"></i></a>
    </td>
<?php
if ($_SESSION['member_role'] == 0){
    ?>
    <td style="    padding-top: 27px;">
        <a href="../Controller/inscriptionEvent_Controller.php?event_id=<?= $event->event_id;?>" style="padding: 10PX 15px; background: #bf152f;color: whitesmoke;text-decoration: none; border-radius: 25px;">Inscription</a>
    </td>
    <?php
}