<?php

namespace MYMVC\Lib;

class FrontController
{
    const NOT_FOUND_CONTROLLER = 'MYMVC\Controllers\notFoundController';
    const NOT_FOUND_ACTION     = 'notFoundAction';

    private $_controller = 'index';
    private $_action     = 'default';
    private $_params     = array();

    private $_template;
    private $_languages;

    public function __construct(Template $template,Languages $languages)
    {
        $this->_template  = $template;
        $this->_languages = $languages;
        $this->_parsUrl();
    }

    private function _parsUrl(){

        $url = explode('/',trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH) , '/'),3);
        if (isset($url[0]) && $url[0] != ''){
            $this->_controller = $url[0];
        }
        if (isset($url[1]) && $url[1] != ''){
            $this->_action = $url[1];
        }
        if (isset($url[2]) && $url[2] != ''){
            $this->_params = explode('/',$url[2]);
        }
    }

    public function dispatch(){
        $controllerClassName = 'MYMVC\Controllers\\' . ucfirst($this->_controller) . 'Controller';
        $actionName          = $this->_action . 'Action';
        if (!class_exists($controllerClassName)){
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
        }
        $controller = new $controllerClassName();
        if (!method_exists($controller,$actionName)){
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        }
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->setTemplate($this->_template);
        $controller->setLanguages($this->_languages);
        $controller->$actionName();
    }
}