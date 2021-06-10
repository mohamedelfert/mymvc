<?php

namespace MYMVC\Lib;

class Template
{
    private $_templateParts;
    private $_action_view;
    private $_data;

    public function __construct(array $parts){
        $this->_templateParts = $parts;
    }

    public function setActionViewFile($actionViewPath){
        $this->_action_view = $actionViewPath;
    }

    public function setAppData($data){
        $this->_data = $data;
    }

    public function setTemplateHeaderStart(){
        require_once TEMPLATE_PATH . 'templateheaderstart.php';
    }

    public function setTemplateHeaderEnd(){
        require_once TEMPLATE_PATH . 'templateheaderend.php';
    }

    public function setTemplateFooter(){
        require_once TEMPLATE_PATH . 'templatefooter.php';
    }

    // this function responsible for set template blocks ( all files required for website ) with data and required view
    public function setTemplateBlocks(){
        if (!array_key_exists('template',$this->_templateParts)){
            trigger_error('Error You Have To Define Template Blocks',E_USER_WARNING);
        }else{
            extract($this->_data);
            $parts = $this->_templateParts['template'];
            if (!empty($parts)){
                foreach ($parts as $partKey => $file){
                    if ($partKey === ':view'){
                        require_once $this->_action_view;
                    }else{
                        require_once $file;
                    }
                }
            }
        }
    }

    // this function responsible for set all header resources ( css and js ) for website
    public function setTemplateHeaderResources(){
        $output = '';
        if (!array_key_exists('header_resources',$this->_templateParts)){
            trigger_error('Error You Have To Define Template Header Resources',E_USER_WARNING);
        }else{
            $resources = $this->_templateParts['header_resources'];

            // Collect Css Links
            $Css = $resources['css'];
            if (!empty($Css)){
                foreach ($Css as $cssKey => $file){
                    $output .= '<link rel="stylesheet" href="' . $file . '">';
                }
            }

            // Collect Js Scripts
            $Js = $resources['js'];
            if (!empty($Js)){
                foreach ($Js as $jsKey => $file){
                    $output .= '<script href="' . $file . '"></script>';
                }
            }
        }
        echo $output;
    }

    // this function responsible for set all footer resources ( js ) for website
    public function setTemplateFooterResources(){
        $output = '';
        if (!array_key_exists('footer_resources',$this->_templateParts)){
            trigger_error('Error You Have To Define Template Footer Resources',E_USER_WARNING);
        }else{
            // Collect Js Scripts
            $resources = $this->_templateParts['footer_resources'];

            if (!empty($resources)){
                foreach ($resources as $resourcesKey => $file){
                    $output .= '<script href="' . $file . '"></script>';
                }
            }
        }
        echo $output;
    }

    // this function responsible for render app
    public function renderApp(){
        $this->setTemplateHeaderStart();
        $this->setTemplateHeaderResources();
        $this->setTemplateHeaderEnd();
        $this->setTemplateBlocks();
        $this->setTemplateFooterResources();
        $this->setTemplateFooter();
    }
}