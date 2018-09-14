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

//$req= $cnx-> prepare(" SELECT * FROM participantslist WHERE validation = 0  ");
//$req->execute();
$list= new ParticipantList();
$response = $list->demandsList();
if ($response->rowCount() > 0) {
    $demands= $response->fetchAll(PDO::FETCH_OBJ);
?>
    <section class="demands">
            <div class="table-responsive container">
                <table class="table table-hover" style="text-align: center; margin-top: 20px;">
                    <caption style="margin:30px 50px 10px;caption-side: top; text-align: center; font-weight: bold; font-size: 40px; color: #bf152f"> Liste des demandes de participation</caption>
                    <thead style="color:  #bf152f;background: black; ">
                    <tr >
                        <th colspan="3" style="border: none;">Participant</th>
                        <th colspan="3" style="border: none;border-left:2px solid whitesmoke;">Evenement</th>
                    </tr>
                    </thead>

                    <tr style="background:  #bf152f;color: whitesmoke;">
                        <td style="border: none;">Id</td>
                        <td style="border: none;">Nom complet</td>
                        <td style="border: none;">Tel</td>
                        <td style="border: none;border-left:2px solid whitesmoke;">Id</td>
                        <td style="border: none;">Nom</td>
                        <td style="border: none;">Lieu</td>
<!--                        <td style="color: black;background: #dee2e6">Validation</td>-->
                    </tr>

                    <tbody>
                    <?php
                    foreach ($demands as $demand) {
                        $req= new Events();
                        $response =$req->findEvent($demand->event_id);
                        $event = $response->fetch(PDO::FETCH_OBJ);
                        $req = new Member();
                        $response = $req->findMemberById($demand->participant_id);
                        $member = $response->fetch(PDO::FETCH_OBJ);

                        ?>
                        <tr>
                            <td ><?= $demand->participant_id; ?></td>
                            <td ><?= $member->mem_firstName.' '.$member->mem_lastName; ?></td>
                            <td ><?= $member->mem_tel; ?></td>
                            <td ><?= $demand->event_id;?></td>
                            <td ><?= $event->event_name;?></td>
                            <td ><?= $event->event_location;?></td>
                            <td style="border-top: none;">
                                <a href="../Controller/validationDemande_Controller.php?event_id=<?= $demand->event_id;?>&part_id=<?= $demand->participant_id;?>" style="padding: 10PX 15px; background: black;color: whitesmoke;text-decoration: none; border-radius: 25px;">valider</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>

                </table>
            </div>
    </section>
<?php
}
?>
