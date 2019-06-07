<?php
class PurchaseController extends MainController {
    public $connect;
    public $adapter;
    public $productTypesEntity;
    public $productTypes;
    public $products;
    public $allProducts;

    public function __construct() {
        parent::__construct();
        $this->connect = new connect();
        $this->allProducts = array();
        $this->adapter = $this->connect->connection();
        $this->products = array();
    }

    public function createPurchase() {
        $productTypesEntity = new ProductTypes($this->adapter);
        $productTypes = $productTypesEntity->getAll();
        $this->view("addPurchase", array(
            "productTypes" => $productTypes
        ));
    }

    public function addAgreement() {
        $purchase = new PurchaseModel($this->adapter);
        $postProducts = json_decode($_POST['products']);
        foreach ($postProducts as $postProduct) {
            $product = new Product($this->adapter);
            $product->setMake($postProduct->make);
            $product->setModel($postProduct->model);
            $product->setSn($postProduct->sn);
            $product->settype($postProduct->type);
            $product->setPricePurchase($postProduct->pricePurchase);
            $product->setPriceSale($postProduct->priceSale);
            $product->setStock($postProduct->stock);
            $product->setState($postProduct->state);
            $products[] = $product;
        }
        $purchase->setProducts($products, $_POST['IDCL']);
        return true;
    }

    public function seePurchases() {
        $purchases = new PurchaseModel($this->adapter);
        $allPurchases = $purchases->getAllPurchases();
        $allProducts=array();
        foreach($allPurchases as $purchase){
            array_push($allProducts,$purchases->getProductsById($purchase->id));
        }
        $this->view("seePurchases", array(
            "allPurchases" => $allPurchases,
            "allProducts" => $allProducts,
        ));
    }
}
