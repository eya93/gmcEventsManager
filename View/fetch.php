<?php
//Artworks of Scanhead   HNU 2017
require_once '../autoload.php';

$connBD= ConnexionBD::getInstance();
if(isset($_POST["query"])) {
    $q = $_POST["query"];
    $results = $connBD->prepare("SELECT event_id, event_name, DATE_FORMAT(event_start,'le %d/%m/%Y à %Hh%imin') AS date_start, DATE_FORMAT(event_end, 'le %d/%m/%Y à %Hh%imin') AS date_end, event_location, event_nbPlace, event_nbPlaceRes FROM events  WHERE event_id LIKE '%" . $q . "%'
        OR event_name LIKE '%" . $q . "%'
        OR event_location LIKE '%" . $q . "%'
        OR event_start LIKE '%" . $q . "%'
        OR event_end LIKE '%" . $q . "%'
        ");
} else {

    $event = new Events();
    $results= $event->findAllEvents();

}
$results->execute();
while($event = $results->fetch(PDO::FETCH_OBJ))
{?>
<tr style="text-align:center">
    <td ><?= $event->event_name;?></td>
    <td><?= $event->date_start;?></td>
    <td ><?= $event->date_end;?></td>

    <td  ><?= $event->event_location;?></td>
    <td ><?= $event->event_nbPlace;?></td>
    <td ><?php $dispo= $event->event_nbPlace-$event->event_nbPlaceRes; echo $dispo;?></td>
    <?php

    require 'actions.php';
    ?>
</tr>;
<?php
}
?>