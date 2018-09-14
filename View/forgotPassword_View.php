<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 00:28
 */
 $title = "ForgotPassword_GoMyCodeEvents";
 ob_start(); ?>

    <div class="section_form">
        <!--------  affichage de Error msg  ou de sucess message s'ils ne sont pas vides-->
        <?php
        if(!empty($emailErr)){
            ?>
            <div class="Msg alert alert-danger" role="alert">
                <span> <?php echo $emailErr;?><br></span>
            </div>
            <?php
        }
        if (!empty($SuccessMsg)){
            ?>
            <div class="Msg alert alert-success" role="alert">
                <span> <?php echo $SuccessMsg;?><br></span>
            </div>
            <?php
        }
        ?>

        <div class="form-content">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1 style="font-weight:bold; font-size: 40px;  margin-bottom: 30px">Mot de passe oublié</h1>
                <p> Nous puvons vous aider à réinitialiser votre mot de passe à l'aide de l'adresse e-mail associée à votre compte </p>
                <!-- champ email ------------------------------------------------------>
                <div class=" form-group ">
                    <label for="inputEmail" >adresse email:</label>
                    <input type="email" id="inputEmail" name="email" class="form-control form-control-md" placeholder="Email"  autofocus="">
                </div>
                <!-- ---button-------------------------------------------------------->
                <div class="form-group" style="display: flex; flex-direction: column; align-items: center ">
                    <button class="btn btn-md btn-danger btn-block" type="submit">Réinitialiser mot de passe</button>
                </div>
            </form>
        </div>

    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>