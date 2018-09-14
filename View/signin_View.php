<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 01/09/2018
 * Time: 21:19
 */
 $title = "SignIn_GoMyCodeEvents"; ?>

<?php ob_start(); ?>

        <div class="section_form">
            <?php
            if(!empty($ErrTab)){
                ?>
                <div class="alert alert-danger" style="font-size: 14px;" role="alert">

                    <strong>Attention <br></strong>
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

            <div class="form-content">
                <form method="post" action="../Controller/signin_Controller.php">
                    <p style="font-weight:bold; font-size: 40px; margin-bottom: 30px">Connectez</p>
                    <!-- champ email ------------------------------------------------------>
                    <div class=" form-group ">
                        <label for="inputEmail" >adresse mail:</label>
                        <input type="email" id="inputEmail" value="<?php echo $email;?>" name="email" class="form-control form-control-md" placeholder="Email"  autofocus="">
                    </div>
                    <!-- champ pwd --------------------------------------------------------->

                    <div class="form-group">
                        <label for="inputPassword" >mot de passe:</label>
                        <input type="password" id="inputPassword"  name="pwd" class="form-control form-control-md" placeholder="mot de passe" >
                    </div>

                    <!-- champ Remember me --------------------------------------------->
                    <div class="form-row rememberRow" style="justify-content: space-between">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="rememberMe" value="0">
                                <i class="helper"></i> <span style=" font-size:15px;">Souviens de moi</span>
                            </label>
                        </div>
                        <div><a href="http://localhost:63342/gomyphp/gmcEventsManager/Controller/forgotPassword_Controller.php"
                                style="color:#bf152f; font-size:15px;">mot de passe oublié</a></div>
                    </div>
                    <!-- ------------------------------------------------------------------->
                    <div class="form-group" style="display: flex; flex-direction: column; align-items: center ">
                        <button class="btn btn-md btn-danger btn-block" type="submit">se connecter</button>
                        <h6 style="margin: 10px 0 0; font-size: 18px;">OU</h6>
                        <span ">Vous n'avez pas un compte <a href="../Controller/signup_Controller.php" style="color:#bf152f;">s'inscrire</a></span>

                    </div>

                </form>
            </div>

        </div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>