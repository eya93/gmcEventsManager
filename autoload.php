<?php
/**
 * Created by PhpStorm.
 * User: Eya'sPC
 * Date: 24/08/2018
 * Time: 11:16
 */

function load($classe){
    $ext = '.php';
    $path = $classe. $ext;

    if(file_exists($path)){
        require $path;
    }else{
        $path = '../Model/' . $classe. $ext;
        if(file_exists($path)){
            require $path;
        }else {
            $path = 'Model/' . $classe. $ext;
            if(file_exists($path)){
                require_once $path;
            } else{
                $path = '../' . $classe. $ext;
                if(file_exists($path)){
                    require_once $path;
                } else{
                    $path = '../View' . $classe. $ext;
                    if(file_exists($path)){
                        require_once $path;
                    }
                }
            }
        }

    }
}

spl_autoload_register('load');
