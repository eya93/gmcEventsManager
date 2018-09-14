<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 02/09/2018
 * Time: 23:50
 */
//validation des diff input
 if (empty($_POST["name"]) && empty($_POST["location"]) && empty($_POST["debut_date"]) || empty($_POST["debut_time"]) || empty($_POST["fin_date"]) || empty($_POST["fin_time"])) {
     $Err = "*Veuillez saisir tt les cahmps";
     array_push($ErrTab,$Err) ;
 } else {
     if (empty($_POST["name"])) {
         $nameErr = "*Veuillez saisir le nom de l'evnmt";
         array_push($ErrTab,$nameErr) ;
     } else {
         $name = htmlspecialchars($_POST["name"]);
         if (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) {
             $nameErr = "*Le nom doit contenir slt des lettres, des chiffres ou espaces";
             array_push($ErrTab,$nameErr) ;
         }
     }

     if (empty($_POST["location"])) {
         $locationErr = "*Veuillez saisir le lieu de l'evnmt";
         array_push($ErrTab,$locationErr) ;
     } else {
         $location = htmlspecialchars($_POST["location"]);
         // check if name only contains letters and whitespace
         if (!preg_match("/^[a-zA-Z0-9 ]*$/", $location)) {
             $locationErr = "*Le nom de lieu doit contenir slt des lettres, des chiffres ou espaces";
             array_push($ErrTab,$locationErr) ;
         }
     }
     if (empty($_POST["debut_date"]) || empty($_POST["debut_time"]) || empty($_POST["fin_date"]) || empty($_POST["fin_time"]) ) {
         $startErr = "*Veuillez saisir date de debut et date de fin";
         array_push($ErrTab,$startErr) ;
     } else {
         $start_date = htmlspecialchars($_POST["debut_date"]);
         $start_date .= ' '.htmlspecialchars($_POST["debut_time"]);
         date_default_timezone_set("Africa/Tunis");
         $limit_min=strtotime("+2 days");
         $limit_max=strtotime("+2 months");
         $limitDate_min =date("Y-m-d h:i", $limit_min);
         $limitDate_max=date("Y-m-d h:i", $limit_max);

         // check if name only contains letters and whitespace
         if ($start_date < $limitDate_min ) {
             $startErr = "*la date doit etre au moins <span style=\"font-weight: bold;\">après deux jour</span> et <span style=\"font-weight: bold;\"> avant deux mois dès aujourd'hui</span> .";
             array_push($ErrTab,$startErr) ;
         } else {
             $end_date = htmlspecialchars($_POST["fin_date"]);
             $end_date .= ' '.htmlspecialchars($_POST["fin_time"]);
             // check if name only contains letters and whitespace
             if ($end_date < $start_date) {
                 $endErr = "*la date de fin doit etre <span style=\"font-weight: bold;\">après date de debut</span>.";
                 array_push($ErrTab,$endErr) ;
             }
         }
     }
     if (empty($_POST["nbPlace"])) {
         $nbPlaceErr = "*Veuillez saisir nombre de place";
         array_push($ErrTab,$nbPlaceErr) ;
     } else {
         $nbPlace = htmlspecialchars($_POST["nbPlace"]);
         // check if name only contains letters and whitespace
         if ( $nbPlace < 10) {
             $nbPlaceErr = "*Le nombre de place doit etre <span style=\"font-weight: bold;\"> supérieur à 10</span> .";
             array_push($ErrTab,$nbPlaceErr) ;
         }
     }





 }
