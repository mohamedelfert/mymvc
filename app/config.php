<?php

if (!defined('DS')){
    define('DS' , DIRECTORY_SEPARATOR);
}

define('APP_PATH',dirname(realpath(__FILE__)));
define('VIEW_PATH',APP_PATH . DS . 'views' . DS);
