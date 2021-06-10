<?php

namespace MYMVC;
use MYMVC\Lib\FrontController;
use MYMVC\Lib\Template;

if (!defined('DS')){
    define('DS' , DIRECTORY_SEPARATOR);
}
require_once '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
require_once APP_PATH . DS . 'lib' . DS . 'autoload.php';
$template_parts = require_once '..' . DS . 'app' . DS . 'config' . DS . 'templateconfig.php';

session_start();

$template = new Template($template_parts);

$frontController = new FrontController($template);
$frontController->dispatch();