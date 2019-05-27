<?php
class CustomersModel extends MainModel{
    private $table;
    
    public function __construct($adapter){
        $this->table="clientes";
        parent::__construct($this->table, $adapter);
    }

    public function addCustomer($customer){
        $imgDni = urldecode ($customer->getImgDni());
        $query = "INSERT INTO `clientes` (dni,nombres,apellidos,domicilio,telefono,email,img_dni)
                VALUES(
                       '{$customer->getDni()}',
                       '{$customer->getName()}',
                       '{$customer->getLastname()}',
                       '{$customer->getAddress()}',
                       '{$customer->getTelephone()}',
                       '{$customer->getEmail()}',
                       '{$imgDni}');";
        return $customer->db()->query($query);
    }

    public function updateCustomer($customer){
        $imgDni = urldecode ($customer->getImgDni());
        $query = "UPDATE `clientes` 
                SET
                dni = '{$customer->getDni()}',
                nombres = '{$customer->getName()}',
                apellidos = '{$customer->getLastname()}',
                domicilio = '{$customer->getAddress()}',
                telefono = '{$customer->getTelephone()}',
                email = '{$customer->getEmail()}',
                img_dni = '{$imgDni}'
                WHERE
                IDCL = '{$customer->getId()}';";
        return $customer->db()->query($query);
    }
}
?>
