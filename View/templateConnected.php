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

<!--        <script-->
<!--                src="https://code.jquery.com/jquery-1.11.3.min.js"-->
<!--                integrity="sha256-7LkWEzqTdpEfELxcZZlS6wAx5Ff13zZ83lYO2/ujj7g="-->
<!--                crossorigin="anonymous">-->
<!---->
<!--        </script>-->
        <script src="../Public/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function(){

                load_data();

                function load_data(query)
                {
                    $.ajax({
                        url:"../View/fetch.php?role=$SESSION[\'mem_role\']",
                        method:"POST",
                        data:{query:query},
                        success:function(data)
                        {
                            $('#result').html(data);
                        }
                    });
                }

                $('#search_text').keyup(function(){
                    var search = $(this).val();
                    if(search != '')
                    {
                        load_data(search);
                    }
                    else
                    {
                        load_data();
                    }
                });
            });
        </script>

    </head>
    <?php include_once 'header.php' ?>
    <body>
            <?= $content ?>
    </body>

</html>