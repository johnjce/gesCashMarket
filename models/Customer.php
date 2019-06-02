<?php
class Customer extends MainEntity {
    
    private $id;
    private $dni;
    private $name;
    private $email;
    private $lastname;
    private $address;
    private $telephone;
    private $imgDni;

    public function __construct($adapter) {
        $table = "customers";
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
        $this->dni = strtolower($dni);
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
        $this->name = strtolower($name);
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = strtolower($email);
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = strtolower($lastname);
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = strtolower($address);
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

}
