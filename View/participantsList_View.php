<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 27/08/2018
 * Time: 15:44
 */
$title = "participant list";

ob_start();
    ?>
    <section class="events">
        <div class="container table-responsive">
            <table class="table table-hover" style="text-align: center;">
                <caption style="margin:30px 50px 10px;caption-side: top; text-align: center; font-weight: bold; font-size: 40px; color: #bf152f"> Liste de participants pour l'évenement "<?= $event->event_name?>"</caption>
                <thead style="color:  #bf152f;background: black;">
                <tr>
                    <th>id</th>
                    <th>prenom</th>
                    <th>Nom</th>
                    <th>Tel</th>

                </tr>
                </thead>
                <?php
                foreach ($participants as $participant) {
                    ?>
                    <tr>
                        <?php
                        $member = new Member();
                        $response = $member->findMemberById($participant->participant_id);
                        $member = $response->fetch(PDO::FETCH_OBJ);

                        ?>

                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </section>
<?php

$content = ob_get_clean();

require('templateConnected.php');
