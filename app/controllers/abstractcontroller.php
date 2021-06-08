<?php

namespace MYMVC\Controllers;

use MYMVC\Lib\FrontController;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;

    public function notFoundAction(){
        $this->_view();
    }

    public function setController($controllerName){
        $this->_controller = $controllerName;
    }

    public function setAction($actionName){
        $this->_action = $actionName;
    }

    public function setParams($params){
        $this->_params = $params;
    }

    protected function _view(){

    }
}