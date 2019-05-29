<?php
class PurchaseController extends MainController{
    public $connect;
    public $adapter;
    public $productTypesEntity;
    public $productTypes;
	
    public function __construct() {
        parent::__construct();
        $this->connect=new connect();
        $this->adapter=$this->connect->connection();
    }

    public function createPurchase(){
        $productTypesEntity = new ProductTypes($this->adapter);
        $productTypes = $productTypesEntity->getAll();
        $this->view("addPurchase",array(
            "productTypes"=>$productTypes
        ));
    }

    public function addAgreement(){
        $purchase = new PurchaseModel($this->adapter);
        $product = new Product($this->adapter);
        echo "aqui pasa por lo menos";
        print_r($_REQUEST);
        return true;
    }
}
