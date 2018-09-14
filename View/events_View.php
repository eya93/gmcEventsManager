<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 21/08/2018
 * Time: 16:52
 *
 */
//recupere la liste des evnmts de la BD
require_once '../autoload.php';
$event = new Events();
$events= $event->findAllEvents();
?>

    <section class="events">
        <div class="form-group">
            <!--            <div class="input-group">-->
            <!--                <span class="input-group-addon">Search</span>-->
            <!--                <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />-->
            <!--            </div>-->
            <!--        </div>-->
        <div class="">
            <!--        affichage de la liste des evnmts--------------------------------->
            <table class="table table-dark table-hover" style="text-align:center; margin-bottom: 30px; width: 100%" >
                <caption style="caption-side: top; text-align: center; font-weight: bold; font-size: 40px; color: black"> Liste des Evenements</caption>

                <thead style="background:  #bf152f;color: black;">
                    <tr>
                        <th >nom</th>
                        <th >date debut</th>
                        <th >date fin</th>
                        <th >lieu</th>
                        <th>nb de place</th>
                        <th>nb de place disponibles</th>
                        <th colspan="4" >Actions</th>


                    </tr>
                </thead>
                <?php
                foreach ($events as $event)  {
                    ?>
                    <tr style="text-align:center">
                        <td ><?= $event->event_name;?></td>
                        <td><?= $event->date_start;?></td>
                        <td ><?= $event->date_end;?></td>

                        <td  ><?= $event->event_location;?></td>
                        <td ><?= $event->event_nbPlace;?></td>
                        <td ><?php $dispo= $event->event_nbPlace-$event->event_nbPlaceRes; echo $dispo;?></td>
                        <?php
                        if ($_SESSION['member_role'] == 1){
                        ?>
                            <td style="padding: 10px;">

                                    <a href="../Controller/deleteEvent_Controller.php?event_id=<?= $event->event_id;?>" data-toggle="tooltip" title="supprimer l'événement"><i style="color: #bf152f;" class="fas fa-eraser fa-sm" ></i></a>
                            </td>
                            <td style="padding: 10px;">
                                <a href="../Controller/editAddEvent_Controller.php?role=edit&event_id=<?= $event->event_id;?>" data-toggle="tooltip" title="modifier l'événement"><i style="color: #bf152f;" class="fas fa-edit fa-sm"></i></a>
                            </td>
                         <?php
                        }
                        ?>
                        <td style="padding: 10px;">
                                     <a href="../Controller/participantsList_Controller.php?event_id=<?= $event->event_id;?>" data-toggle="tooltip" title="liste des participants à cet événement"><i style="color: #bf152f;" class="fas fa-list-ol fa-sm"></i></a>
                        </td>
                        <?php
                        if ($_SESSION['member_role'] == 0){
                        ?>
                            <td style="    padding-top: 27px;">
                                <a href="../Controller/inscriptionEvent_Controller.php?event_id=<?= $event->event_id;?>" style="padding: 10PX 15px; background: #bf152f;color: whitesmoke;text-decoration: none; border-radius: 25px;">Inscription</a>
                            </td>
                        <?php
                        }
                        ?>

                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
            if ($_SESSION['member_role'] == 1) {
            ?>
                <div class="row">
                    <div class="col-md-2 offset-md-5">
                        <span style="background-color: #bf152f; padding: 15px 20px; margin:30px; border-radius:30px ;"> <a href="../Controller/editAddEvent_Controller.php?role=add&event_id=0" style="color: black; font-weight: bold"> <i style="margin-right: 10px;color: black" class="fas fa-calendar-plus"></i>Add event</a></span>
                    </div>
                 </div>
                <?php
            }
            ?>

        </div>

    </section>

