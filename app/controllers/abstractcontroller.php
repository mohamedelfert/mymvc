<?php

namespace MYMVC\Controllers;
use MYMVC\Lib\FrontController;

class AbstractController
{
    protected $_controller;
    protected $_action;
    protected $_params;
    protected $_template;
    protected $_languages;

    protected $_data = [];

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

    public function setTemplate($template){
        $this->_template = $template;
    }

    public function setLanguages($languages){
        $this->_languages = $languages;
    }

    protected function _view(){
        if ($this->_action === FrontController::NOT_FOUND_ACTION){
            $view = VIEW_PATH . 'notfound' . DS . 'notfound.view.php';
            $this->_template->setActionViewFile($view);
            $this->_template->setAppData($this->_data);
            $this->_template->renderApp();
        }else{
            $view = VIEW_PATH . $this->_controller . DS . $this->_action . '.view.php';
            if (file_exists($view)){
                $this->_data = array_merge($this->_data,$this->_languages->getDictionary());
                // render all data and view by using template class that handle all required files for template
                $this->_template->setActionViewFile($view);
                $this->_template->setAppData($this->_data);
                $this->_template->renderApp();
            }else{
                $view = VIEW_PATH . 'notfound' . DS . 'noview.view.php';
                $this->_template->setActionViewFile($view);
                $this->_template->setAppData($this->_data);
                $this->_template->renderApp();
            }
        }
    }
}