<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 �.
 * Time: 13:57 �.
 */
class Autoloader {
    protected static $paths = array('classes','templates');

    public static function autoload($className) {
        foreach(self::$paths as $path) {
            $file = "$path/$className.class.php";
            if(file_exists($file)){
                require_once($file);
            }
        }
    }
}

spl_autoload_register(array('Autoloader', 'autoload'));