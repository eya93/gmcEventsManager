<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" type="text/css" href="../Public/bootstrap.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="../Public/style.css" rel="stylesheet" />
    </head>
    <?php include_once 'header.php' ?>
    <body>
        <div class="sections">
            <div class="section_img" style="background: black;">
                <p align="center" style="margin-top:30px; height:580px; color:white; font-size:150px; font-weight: bold">
                    <span style="font-family: 'Ubuntu Condensed', sans-serif;">
                        <span style="display: block">GO MY</span> <span style="display: block; margin-top: -70px; font-size: 100px">C<span style=" color:#bf152f">{<}</span>DE</span>
                    </span>
                    <span style=" font-family: 'Fjalla One', sans-serif;font-size: 170px; color:#bf152f">
                        EVENTS
                    </span>
                </p>
            </div>
            <?= $content ?>
        </div>
    </body>
</html>