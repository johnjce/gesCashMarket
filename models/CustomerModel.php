<?php
class CustomersModel extends MainModel {

    private $table;

    public function __construct($adapter){
        $this->table="customers";
        parent::__construct($this->table, $adapter);
    }

    public function addCustomer($customer){
        $imgDni = urldecode ($customer->getImgDni());
        $signaturePicture = urldecode ($customer->getSignaturePicture());

        $query = "INSERT INTO `customers` (dni,names,lastname,address,telephone,email,img_dni,signaturePicture)
                VALUES(
                       '{$customer->getDni()}',
                       '{$customer->getName()}',
                       '{$customer->getLastname()}',
                       '{$customer->getAddress()}',
                       '{$customer->getTelephone()}',
                       '{$customer->getEmail()}',
                       '{$imgDni}',
                       '{$signaturePicture}');";
        return $customer->db()->query($query);
    }

    public function updateCustomer($customer){
        $imgDni = urldecode ($customer->getImgDni());
        $query = "UPDATE `customers` 
                SET
                dni = '{$customer->getDni()}',
                names = '{$customer->getName()}',
                lastname = '{$customer->getLastname()}',
                address = '{$customer->getAddress()}',
                telephone = '{$customer->getTelephone()}',
                email = '{$customer->getEmail()}',
                img_dni = '{$imgDni}'
                WHERE
                IDCL = '{$customer->getId()}';";
        return $customer->db()->query($query);
    }

    public function search($value){
        $query = "SELECT IDCL, names, lastname, dni 
                    FROM customers 
                    WHERE names LIKE '%$value%' OR
                    lastname LIKE '%$value%' OR
                    dni LIKE '%$value%' OR
                    address LIKE '%$value%' OR
                    email LIKE '%$value%' OR
                    telephone LIKE '%$value%'";
        return $this->executeSQL($query);
    }
}
?>
