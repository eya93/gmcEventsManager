<?php $title = "SignUp_GoMyCodeEvents"; ?>

<?php ob_start(); ?>
    <div class="section_form">
        <!--------  affichage de tableau de Error msg  ou de sucess message s'ils ne sont pas vides-->
        <?php
        if(!empty($ErrTab)){
        ?>
        <div class="Msg alert alert-danger" role="alert">

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
        if (!empty($SuccessMsg)){
        ?>
        <div class="Msg alert alert-success" role="alert">
            <strong>incription avec succès<br></strong>
            <span> <?php echo $SuccessMsg;?><br></span>
        </div>
        <?php
         }
         ?>
        <!--------  affichage de formulaire -->
        <div class="form-content">
            <form method="post" action="../Controller/signup_Controller.php">
            <h1 style="font-weight:bold; font-size: 40px;margin-bottom: 30px">Inscription</h1>
            <!-- champ nom ------------------------------------------------------>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNom" >Nom:</label>
                    <input type="text" id="inputNom" name="nom" value="<?php echo $nom;?>" class="form-control form-control-sm" placeholder="Nom"  >
                </div>
                <!-- champ prenom ----------------------------------------------------->
                <div class="form-group col-md-6">
                    <label for="inputPrenom" >Prenom:</label>
                    <input type="text" id="inputPrenom" name="prenom" value="<?php echo $prenom;?>" class="form-control form-control-sm" placeholder="Prenom"  autofocus="">
                </div>
            </div>
            <!-- champ email ------------------------------------------------------>
            <div class=" form-group Input">
                <label for="inputEmail" >adresse mail:</label>
                <input type="email" id="inputEmail" name="email" value="<?php echo $email;?>" class="form-control form-control-sm" placeholder="Email"  autofocus="">
            </div>
            <!-- champ tel ------------------------------------------------------>
                <div class="form-group col-md-6 telInput">
                    <label for="telNo" >tel:</label>
                    <input type="text" id="telNo" name="tel" class="form-control form-control-sm" placeholder="  XX XXX XXX" >
                </div>
            <!-- champ pwd --------------------------------------------------------->
            <div class="form-row">
                <div class="form-group col-md-6 Input">
                    <label for="inputPassword" >mot de passe:</label>
                    <input type="password" id="inputPassword"  name="pwd" class="form-control form-control-sm" placeholder="mot de passe" >
                </div>
                <!-- champ pwd Confirmation -------------------------------------------->
                <div class="form-group col-md-6 Input" >
                    <label for="inputPasswordConf" >confirmation:</label>
                    <input type="password" id="inputPasswordConf" name="pwdConfirmation" class="form-control form-control-sm" placeholder="confirmer mot de passe" >
                </div>
            </div>

            <!-- ------------------------------------------------------------------->
            <div class="form-group" style="display: flex; flex-direction: column; align-items: center ">
                <button class="btn btn-md btn-danger btn-block" type="submit">s'incrire</button>
                <h6 style="margin: 10px 0 0; font-size: 18px;">OU</h6>
                <span>Vous avez deja un compte <a href="../Controller/signin_Controller.php" style="color:#bf152f;">connectez-vous</a></span>

            </div>

            </form>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>