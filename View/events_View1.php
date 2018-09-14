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
<!--    <div class="form-group"-->
<!--    <div class="input-group">-->
<!--        <span class="input-group-addon">Search</span>-->
<!--        <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />-->
<!--    </div>-->
<!--    </div>-->
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

            <tbody id="result">

            </tbody>

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

