<?php

namespace MYMVC\Controllers;
use MYMVC\Lib\Helper;
use MYMVC\Lib\InputFilters;
use MYMVC\Models\EmployeesModel;

class EmployeesController extends AbstractController
{
    use InputFilters;
    use Helper;

    public function defaultAction(){
        $this->_data['employees'] = EmployeesModel::getAll();
        $this->_view();
    }

    public function addAction(){
        if (isset($_POST['submit'])){
            $emp = new EmployeesModel();
            $emp->name    = $this->filterStr($_POST['name']);
            $emp->age     = $this->filterInt($_POST['age']);
            $emp->address = $this->filterStr($_POST['address']);
            $emp->salary  = $this->filterFloat($_POST['salary']);
            $emp->tax     = $this->filterFloat($_POST['tax']);
            $emp->gender  = $this->filterInt($_POST['gender']);
            $emp->shift   = $this->filterInt($_POST['shift']);
            $emp->systems = serialize($_POST['systems']);
            $emp->notes   = $this->filterStr($_POST['notes']);
            if ($emp->save()){
                $_SESSION['success'] = '<div style="background: #5bf728;padding: 5px;text-align: center"><b> Employee, Inserted Successfully :) </b></div>';
                $this->redirect('/employees');
            }else{
                $_SESSION['error'] = '<div style="background: red;padding: 5px;text-align: center"><b> Error Inserting Employee :( </b></div>';
                $this->redirect('/employees');
            }
        }

        $this->_view();
    }

    public function editAction(){
        $id = $this->filterInt($this->_params[0]);
        $emp = EmployeesModel::getByPk($id);
        if ($emp === false){
            $this->redirect('/employees');
        }
        $emp->systems = unserialize($emp->systems);
        $this->_data['employees'] = $emp;
        if (isset($_POST['submit'])){
            $emp->name    = $this->filterStr($_POST['name']);
            $emp->age     = $this->filterInt($_POST['age']);
            $emp->address = $this->filterStr($_POST['address']);
            $emp->salary  = $this->filterFloat($_POST['salary']);
            $emp->tax     = $this->filterFloat($_POST['tax']);
            $emp->gender  = $this->filterInt($_POST['gender']);
            $emp->shift   = $this->filterInt($_POST['shift']);
            $emp->systems = serialize($_POST['systems']);
            $emp->notes   = $this->filterStr($_POST['notes']);
            if ($emp->save()){
                $_SESSION['success'] = '<div style="background: #5bf728;padding: 5px;text-align: center"><b> Employee, Inserted Successfully :) </b></div>';
                $this->redirect('/employees');
            }else{
                $_SESSION['error'] = '<div style="background: red;padding: 5px;text-align: center"><b> Error Inserting Employee :( </b></div>';
                $this->redirect('/employees');
            }
        }

        $this->_view();
    }

    public function deleteAction(){
        $id = $this->filterInt($this->_params[0]);
        $emp = EmployeesModel::getByPk($id);
        if ($emp === false){
            $this->redirect('/employees');
        }
        $this->_data['employees'] = $emp;

        if ($emp->delete()){
            $_SESSION['success'] = '<div style="background: #5bf728;padding: 5px;text-align: center"><b> Employee, Deleted Successfully :) </b></div>';
            $this->redirect('/employees');
        }else{
            $_SESSION['error'] = '<div style="background: red;padding: 5px;text-align: center"><b> Error Inserting Employee :( </b></div>';
            $this->redirect('/employees');
        }
    }
}