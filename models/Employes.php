<?php
class Employes extends MainEntity {
    
    private $id;
    private $user;
    private $pass;
    private $privilegeLevel;

    public function __construct($adapter) {
        $table = "employes";
        parent::__construct($table, $adapter);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function getPrivilegeLevel() {
        return $this->privilegeLevel;
    }

    public function setPrivilegeLevel($privilegeLevel) {
        $this->privilegeLevel = $privilegeLevel;
    }
}
?>