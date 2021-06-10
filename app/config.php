<?php

if (!defined('DS')){
    define('DS' , DIRECTORY_SEPARATOR);
}

define('APP_PATH',dirname(realpath(__FILE__)));
define('VIEW_PATH',APP_PATH . DS . 'views' . DS);
define('TEMPLATE_PATH',APP_PATH . DS . 'template' . DS);

// Database Credentials
defined('DATABASE_HOST_NAME')       ? null : define ('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USERNAME')        ? null : define ('DATABASE_USERNAME', 'root');
defined('DATABASE_PASSWORD')        ? null : define ('DATABASE_PASSWORD', '');
defined('DATABASE_DB_NAME')         ? null : define ('DATABASE_DB_NAME', 'employees');
defined('DATABASE_PORT_NUMBER')     ? null : define ('DATABASE_PORT_NUMBER', 3306);
defined('DATABASE_CONN_DRIVER')     ? null : define ('DATABASE_CONN_DRIVER', 1);
