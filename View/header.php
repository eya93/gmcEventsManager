<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 23/08/2018
 * Time: 09:42
 */?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand brand" style="color:ghostwhite" href="https://gomycode.tn/" target="_blank"><img src="../Public/images/logo.png" alt="logo" height="50px" style="margin-left:10px; padding: 5px ;"  ></a>
    <ul class="navbar-nav ml-auto">

    <?php
    if (isset($_SESSION['member_id'])) {
        ?>
        <li class=" nav-item ml ">
                <span class="input-group-addon"></span>
                <input type="text" name="search_text" id="search_text" placeholder="Search for event" class="form-control" />
        </li>
        <li class="nav-item ml logout-btn" style=""  >
            <form action="../Controller/logout.php" method="post">
                <button class="btn btn-md btn-dark btn-block"  type="submit" name="deconnect">Déconnexion</button>
            </form>
        </li>
        <?php
    } else {
        ?>
        <div class="collapse navbar-collapse" id="navbarNav" style="float: right">
                <li class="nav-item ml">
                    <a class="nav-link" href="../Controller/signup_Controller.php">S'inscrire</a>
                </li>
                <li class="nav-item ml">
                    <a class="nav-link"  href="../Controller/signin_Controller.php">Se connecter</a>
                </li>
        </div>
        <?php
    }
    ?>
    </ul>
</nav>