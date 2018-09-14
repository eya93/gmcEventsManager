<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 17:47
 */
$title = "Events Editor";

ob_start(); ?>

    <section style=" display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding:10px 80px;">
        <?php
        if(!empty($ErrTab)){
            ?>
            <div class="Msg alert alert-danger" role="alert" align="center">

                <strong style="font-size: 20px">Attention <br></strong>
                <?php
                foreach( $ErrTab as $ErrMsg){
                    ?>
                    <span class="error"> <?php echo $ErrMsg;?><br></span>
                    <?php
                }?>
            </div>
            <?php
        }
        ?>
        <div class="container offset-lg-3" style="margin-top: 20px">
            <form method="post" action="<?php echo "../Controller/editAddEvent_Controller.php?role=".$_GET['role']."&event_id=".$_GET['event_id'];?>" style="width: 50%;">
                <h1 style="font-weight: bold; font-size: 40px; color: #bf152f" align="center">
                    <?php if($_GET['role'] == 'edit'){
                        echo "Modifier l'événement";
                    } elseif ($_GET['role'] == 'add'){
                        echo "Ajouter un événement";
                    }
                    ?>
                </h1>
                <div class="form-group">
                    <label for="inputNom" >Nom de l'evnmt :</label>
                    <input type="text" id="inputNom" name="name" value="<?php if (isset($_GET['event_id'])&& $_GET['event_id'] != 0) { echo $row->event_name;}?>" class="form-control form-control-sm" placeholder="Nom de l'evnmt"  >
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="debutDt" >Date debut: </label>
                        <input type="date" id="debutD" name="debut_date" class="form-control form-control-sm" value="<?php if (isset($_GET['event_id']) && $_GET['event_id'] != 0) { echo substr($row->event_start,0,10);}?>"  />
                    </div>
                    <div class="form-group">
                        <label for="debut-time" style="color: transparent"> heure </label>
                        <input type="time" id="debut-time" name="debut_time" style="margin-left: 10px;" class="form-control form-control-sm" value="<?php if (isset($_GET['event_id'])&& $_GET['event_id'] != 0) { echo substr($row->event_start,11,5);}?>" />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group ">
                        <label for="start" >Date fin: </label>
                        <input type="date" id="start" name="fin_date" class="form-control form-control-sm" value="<?php if (isset($_GET['event_id'])&& $_GET['event_id'] != 0) { echo substr($row->event_end,0,10);}?>"   />
                    </div>
                    <div class="form-group">
                        <label for="fin-time" style="color: transparent"> heure </label>
                        <input type="time" id="fin-time" name="fin_time" style="margin-left: 10px;" class="form-control form-control-sm"  value="<?php if (isset($_GET['event_id'])&& $_GET['event_id'] != 0) { echo substr($row->event_end,11,5);}?>"  />
                    </div>
                </div>

                <div class="form-group ">
                    <label for="inputNom" >Emplacement de l'evnmt:</label>
                    <input type="text" id="inputNom" name="location"  class="form-control form-control-sm" placeholder="Lieu de l'evnmt" value="<?php if (isset($_GET['event_id'])&& $_GET['event_id'] != 0) { echo $row->event_location;}?>" >
                </div>

                <div class="form-group ">
                    <label for="nb" >Nombre de place totale:</label>
                    <input type="number" id="nb" name="nbPlace" class="form-control form-control-sm col-md-4" placeholder="Nombre de places"  value="<?php if (isset($_GET['event_id'])&& $_GET['event_id'] != 0) { echo $row->event_nbPlace;} else {echo "0";}?>">
                </div>
                <button class="btn btn-md btn-dark btn-block " type="submit" name="validate">Valider</button>
            </form>
        </div>
    </section>



<?php $content = ob_get_clean();

require('templateConnected.php');

