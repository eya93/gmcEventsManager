<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 01:08
 */

 $title = "ResetPassword_GoMyCodeEvents";
 ob_start(); ?>

        <div class="section_form">
            <?php
            if (!empty($ErrMsg)){
                ?>
                <div class="Msg alert alert-danger" role="alert">
                    <strong>Attention<br></strong>
                    <span> <?php echo $ErrMsg;?><br></span>
                </div>
                <?php
            }
            ?>

            <div class="form-content">
<!--                --><?//= "resetPassword_Controller.php.?email=".$email; ?>

                <form method="post" action="<?= "resetPassword_Controller.php?email=".$email;?>">
                    <p  style="font-weight:bold; font-size: 40px;  margin-bottom: 30px;" align="center"> Réinitialisation de mot de passe</p>
                    <!-- champ pwd --------------------------------------------------------->
                    <div class="form-group">
                        <label for="inputPassword" >mot de passe:</label>
                        <input type="password" id="inputPassword"  name="pwd" class="form-control form-control-md" placeholder="mot de passe" >
                    </div>
                    <!-- champ pwd Confirmation -------------------------------------------->
                    <div class="form-group">
                        <label for="inputPasswordConf" >confirmation mot de passe:</label>
                        <input type="password" id="inputPasswordConf" name="pwdConfirmation" class="form-control form-control-md" placeholder="confirmer mot de passe" >
                    </div>

                    <!-- ------------------------------------------------------------------->
                    <div class="form-group" >
                        <button class="btn btn-md btn-danger btn-block" style="margin-top:30px"   type="submit">Valider</button>

                    </div>

                </form>
            </div>

        </div>


<?php
$content = ob_get_clean();
require('template.php');