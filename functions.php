<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 20/08/2018
 * Time: 15:34
 */
function redirect ($name) {
    $dossier_name= explode("_",$name);
    header ( 'Location: '.$dossier_name[1].'/'.$name.'.php');
    exit();
}
function creatToken ($len = 10) {
    $token="qsdfghjklwxcvbnazertyuiopAZERTYUIOPQSDFGHJKLWXCVBN1234567890!$/()*";
    $token= str_shuffle($token);
    $token= substr($token,rand(0,45),$len);
    return $token;
}