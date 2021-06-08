<?php

namespace MYMVC\Lib;

class AutoLoad
{
    public static function autoload($className){
        // replace MYMVC name space with ''
        $className = str_replace('MYMVC','',$className);
        // replace \ with /
        $className = str_replace('\\','/',$className);
        // add .php to className file
        $className = $className . '.php';
        // strtolower for folders name and files name
        $className = strtolower($className);
        if (file_exists(APP_PATH . $className)){
            require_once APP_PATH . $className;
        }
    }
}

spl_autoload_register(__NAMESPACE__ . '\AutoLoad::autoload');