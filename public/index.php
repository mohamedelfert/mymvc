<?php

namespace MYMVC;
use MYMVC\Lib\FrontController;

if (!defined('DS')){
    define('DS' , DIRECTORY_SEPARATOR);
}

require_once '..' . DS . 'app' . DS . 'config.php';
require_once APP_PATH . DS . 'lib' . DS . 'autoload.php';

$frontController = new FrontController();