<?php

namespace MYMVC\Models;
use MYMVC\Lib\Database\DatabaseHandler;

class AbstractModel
{
    const DATA_TYPE_BOOL    = \PDO::PARAM_BOOL;
    const DATA_TYPE_STR     = \PDO::PARAM_STR;
    const DATA_TYPE_INT     = \PDO::PARAM_INT;
    const DATA_TYPE_DECIMAL = 4;

    // function دي بتاخد stmt بتاعتي وتعمل عليها loop عن طريق foreach لانها عباره عن associative array وتعمل للقيم
    // sanitize زي  ( name = :name or name = ? ) اما bindparam or bindvalue .
    private function prepareValues(\PDOStatement &$stmt){
        foreach (static::$tableSchema as $columnName => $type){
            if ($type == 4){
                $sanitizedValue = filter_var($this->$columnName,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                $stmt->bindValue(":{$columnName}",$sanitizedValue);
            }else{
                $stmt->bindValue(":{$columnName}",$this->$columnName,$type);
            }
        }
    }

    // function دي بتبني الجملة بتاعتي في تركيبها زي ( insert into tablename set name = : name ) وفي النهاية trim لعلامة , من نهاية او بداية الجملة
    private static function buildBindParametersSql(){
        $bindParameters = '';
        foreach (static::$tableSchema as $columnName => $type){
            $bindParameters .= $columnName . ' = :' . $columnName . ', ';
        }
        return trim($bindParameters, ', ');
    }

    private function create(){
        $sql  = 'INSERT INTO ' . static::$tableName . ' SET ' . self::buildBindParametersSql();
        $stmt = DatabaseHandler::factory()->prepare($sql);
        $this->prepareValues($stmt);
        if ($stmt->execute()){
            $this->{static::$primaryKey} = DatabaseHandler::factory()->lastInsertId();
            return true;
        }
        return false;
    }

    private function update(){
        $sql  = 'UPDATE ' . static::$tableName . ' SET ' . self::buildBindParametersSql() . ' WHERE ' . static::$primaryKey . ' = ' . $this->{static::$primaryKey};
        $stmt = DatabaseHandler::factory()->prepare($sql);
        $this->prepareValues($stmt);
        return $stmt->execute();
    }

    public function save(){
        return $this->{static::$primaryKey} === null ? $this->create() : $this->update();
    }

    public function delete(){
        $sql = 'DELETE FROM ' . static::$tableName . ' WHERE ' . static::$primaryKey . ' = ' . $this->{static::$primaryKey};
        $stmt = DatabaseHandler::factory()->prepare($sql);
        return $stmt->execute();
    }

    public static function getAll(){
        $sql     = 'SELECT * FROM ' . static::$tableName;
        $stmt    = DatabaseHandler::factory()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_CLASS ,get_called_class());
        return (is_array($results) && !empty($results) ? $results : false);
    }

    public static function getByPk($pk){
        $sql  = 'SELECT * FROM ' . static::$tableName . ' WHERE ' . static::$primaryKey . ' = "' . $pk . '"';
        $stmt = DatabaseHandler::factory()->prepare($sql);
        if ($stmt->execute() === true){
            $obj = $stmt->fetchAll(\PDO::FETCH_CLASS ,get_called_class());
            return array_shift($obj);
        }
        return false;

    }

    public static function get($sql,$options = array()){
        $stmt = DatabaseHandler::factory()->prepare($sql);
        if (!empty($options)){
            foreach ($options as $columnName => $type){  // $type is indexed array index[0] = type and index[1] = value of named parameter
                if ($type[0] == 4){ // index[0] the type
                    $sanitizedValue = filter_var($type[1],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                    $stmt->bindValue(":{$columnName}",$sanitizedValue);
                }else{
                    $stmt->bindValue(":{$columnName}",$type[1],$type[0]); // index[0] = type and index[1] = value of named parameter
                }
            }
        }
        $stmt->execute();
        $results = $stmt->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE ,get_called_class(),array_keys(static::$tableSchema));
        return (is_array($results) && !empty($results) ? $results : false);
    }
}