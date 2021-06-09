<?php

namespace MYMVC\Models;

class EmployeesModel extends AbstractModel {
    public $id;
    public $name;
    public $age;
    public $address;
    public $salary;
    public $tax;

    protected static $tableName = 'employee';

    protected static $tableSchema = array(
      'name'        => self::DATA_TYPE_STR,
      'age'         => self::DATA_TYPE_INT,
      'address'     => self::DATA_TYPE_STR,
      'salary'      => self::DATA_TYPE_DECIMAL,
      'tax'         => self::DATA_TYPE_DECIMAL
    );

    protected static $primaryKey = 'id';

    public function calc_salary(){
        $salary  = $this->salary - ($this->salary * $this->tax / 100);
        return $salary;
    }
}