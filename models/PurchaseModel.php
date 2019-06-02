<?php
class PurchaseModel extends MainModel {

    private $table;
    private $AgreementId;

    public function __construct($adapter) {
        $this->table = "products";
        parent::__construct($this->table, $adapter);
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $this->AgreementId = substr(str_shuffle($permitted_chars), 0, 10);
    }

    public function setProducts($products, $IDCL) {
        $query = "INSERT INTO lrvd (documentId, IDCL) VALUES ('$this->AgreementId', $IDCL)";
        $this->executeSQL($query);
        $query = "SELECT id FROM lrvd WHERE documentId='$this->AgreementId'";
        $lastId = $this->executeSQL($query);
        $query = "INSERT INTO products (make, model, sn, type, pricePurchase, priceSale, stock, productState, state, idPurchase,currentAgreement)
                VALUES";
        foreach($products as $product){
            print_r($product);
            $query .="('{$product->getMake()}',
                       '{$product->getModel()}',
                       '{$product->getSn()}',
                       '{$product->getType()}',
                       '{$product->getPricePurchase()}',
                       '{$product->getPriceSale()}',
                       '{$product->getStock()}',
                       '{$product->getState()}',
                       '100',
                       '{$lastId->id}',
                       '{$lastId->id}'),"; 
        }
        $query = substr ($query, 0, strlen($query) - 1);
        return $product->db()->query($query);
    }

    public function getAllPurchases(){
        $query = "SELECT customers.IDCL, customers.names, customers.lastname, customers.telephone, 
                         customers.dni, customers.address, lrvd.id, lrvd.date, lrvd.documentId
                    FROM lrvd, customers 
                    WHERE customers.IDCL = lrvd.IDCL";
        return $this->executeSQL($query);
    }

    public function getProductsById($id){
        $query = "SELECT *
                    FROM products 
                    WHERE idPurchase=$id";
        return $this->executeSQL($query);
    }
}