<?php

namespace MYMVC;
use MYMVC\Lib\FrontController;
use MYMVC\Lib\Languages;
use MYMVC\Lib\Template;

session_start();

if (!defined('DS')){
    define('DS' , DIRECTORY_SEPARATOR);
}
require_once '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
require_once APP_PATH . DS . 'lib' . DS . 'autoload.php';

if (!isset($_SESSION['lang'])){
    $_SESSION['lang'] = APP_DEFAULT_LANGUAGES;
}

$template_parts = require '..' . DS . 'app' . DS . 'config' . DS . 'templateconfig.php';


$template = new Template($template_parts);
$languages = new Languages();

$frontController = new FrontController($template,$languages);
$frontController->dispatch();