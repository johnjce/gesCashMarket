<?php
class EmployesModel extends MainModel {

    private $table;

    public function __construct($adapter) {
        $this->table = "employes";
        parent::__construct($this->table, $adapter);
    }

    public function getPassByUser($user) {
        $query = "SELECT pass, privilegeLevel
        FROM employes 
        WHERE user ='$user'";
        return $this->executeSQL($query);
    }
}
