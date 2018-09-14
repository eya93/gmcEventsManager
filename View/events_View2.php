<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 21/08/2018
 * Time: 16:52
 *
 */
//recupere la liste des evnmts de la BD


?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="../Public/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="../Public/style.css" rel="stylesheet" />

    <script src="../Public/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){

            load_data();

            function load_data(query)
            {
                $.ajax({
                    url:"fetch.php",
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


        function showRow(row)
        {
            var x=row.cells;
            document.getElementById("custID").value = x[0].innerHTML;
            document.getElementById("fname").value = x[1].innerHTML;
            document.getElementById("lname").value = x[2].innerHTML;
        }

    </script>
</head>
    <section class="events">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
            </div>
        </div>
        <div class="listeTab">
            <!--        affichage de la liste des evnmts--------------------------------->
            <table class="table table-dark table-hover" style="text-align:center; margin-bottom: 30px; width: 100%" >
                <caption style="caption-side: top; text-align: center; font-weight: bold; font-size: 40px; color: black"> Liste des Evenements</caption>

                <thead style="background:  #bf152f;color: black;">
                    <tr>
                        <th >id</th>
                        <th >nom</th>
                        <th >lieu</th>
                        <th >date debut</th>
                        <th >date fin</th>
<!--                        <th>nb de place</th>-->
<!--                        <th>nb de place disponibles</th>-->
<!--                        <th colspan="4" >Actions</th>-->


                    </tr>
                </thead>
                <tbody id="result">

                </tbody>
            </table>

<!--            --><?php
//            if ($_SESSION['member_role'] == 1) {
//            ?>
<!--                <div class="row">-->
<!--                    <div class="col-md-2 offset-md-5">-->
<!--                        <span style="background-color: #bf152f; padding: 15px 20px; margin:30px; border-radius:30px ;"> <a href="../Controller/editAddEvent_Controller.php?role=add&event_id=0" style="color: black; font-weight: bold"> <i style="margin-right: 10px;color: black" class="fas fa-calendar-plus"></i>Add event</a></span>-->
<!--                    </div>-->
<!--                 </div>-->
<!--                --><?php
//            }
//            ?>

        </div>

    </section>

