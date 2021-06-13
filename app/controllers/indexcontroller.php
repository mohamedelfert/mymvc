<?php

namespace MYMVC\Controllers;

class IndexController extends AbstractController
{
    public function defaultAction(){
        $this->_languages->load('template.common');
        $this->_view();
    }
}