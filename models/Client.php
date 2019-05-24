<?php
class Client extends MainEntity{
    private $id;
    private $dni;
    private $name;
    private $lastname;
    private $address;
    private $telephone;
    private $imgDni;
    
    public function __construct($adapter) {
        $table="clientes";
        parent::__construct($table, $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getDni() {
        return $this->dni;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }
    
    public function getImgDni() {
        return $this->imgDni;
    }

    public function setImgDni($imgDni) {
        $this->imgDni = $imgDni;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }
}
?>