<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 16/08/2018
 * Time: 14:01
 */

//avec singleton
class ConnexionBD
{
    private static $CnxBD = null;//un seul exemplaire de ce paramértre pr tt les objets
    private const HOST='localhost';
    private const USER='root';
    private const PWD='';
    private const BD_NAME='gmc_events';

    private function __construct()//accessible slt à l'intérieur de la classe (expl dans getInstance
    {
        try {
            self::$CnxBD = new PDO('mysql:host='.self::HOST.';dbname='.self::BD_NAME,
                self::USER,
                self::PWD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
//methode de classe: accessible independamment de l'objet mm sans intancier un objet de classe
// va remplacer fct getCnxPDO
    public static function getInstance () {
        if(!self::$CnxBD) {
            new ConnexionBD();
        }
        return self::$CnxBD;
    }

}
