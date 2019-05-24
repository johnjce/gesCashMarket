<?php
class MainEntity{
    
    private $table;
    private $db;

    public function __construct($table, $adapter){
        $this->table=(string) $table;
        $this->db = $adapter;
    }

    public function db(){
        return $this->db;
    }

    public function getAll(){
        $query = $this->db()->query("SELECT * FROM $this->table ORDER BY IDCL DESC");
        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    public function getById($id){
        $query = $this->db()->query("SELECT * FROM $this->table WHERE IDCL=$id");

        if ($row = $query->fetch_object()) {
            $resultSet = $row;
        }

        return $resultSet;
    }

    public function getBy($column, $value){
        $query = $this->db()->query("SELECT * FROM $this->table WHERE $column='$value'");

        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }

        return $resultSet;
    }

    public function deleteById($id){
        $query = $this->db()->query("DELETE FROM $this->table WHERE IDCL=$id");
        echo $this->table;
        echo $id;
        return $query;
    }

    public function deleteBy($column, $value){
        $query = $this->db()->query("DELETE FROM $this->table WHERE $column='$value'");
        return $query;
    }
}