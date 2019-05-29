<?php
class Product extends MainEntity {
    
    private $id;
    private $type;
    private $make;
    private $model;
    private $sn;
    private $stock;
    private $state;
    private $idPurchase;
    private $pricePurchase;
    private $priceSale;
    private $priceReservation;
    private $productState;
    private $currentAgreement;

    public function __construct($adapter) {
        $table="products";
        parent::__construct($table,$adapter);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type)  {
        $this->type = strtolower($type);
    }

    public function getMake() {
        return $this->make;
    }

    public function setMake($make) {
        $this->make = strtolower($make);
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = strtolower($model);
    }

    public function getSn() {
        return $this->sn;
    }

    public function setSn($sn) {
        $this->sn = strtolower($sn);
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function getIdPurchase() {
        return $this->idPurchase;
    }

    public function setIdPurchase($idPurchase) {
        $this->idPurchase = $idPurchase;
    }

    public function getPricePurchase() {
        return $this->pricePurchase;
    }

    public function setPricePurchase($pricePurchase) {
        $this->pricePurchase = $pricePurchase;
    }

    public function getPriceSale() {
        return $this->priceSale;
    }

    public function setPriceSale($priceSale) {
        $this->priceSale = $priceSale;
    }

    public function getpriceReservation() {
        return $this->priceReservation;
    }

    public function setpriceReservation($priceReservation) {
        $this->priceReservation = $priceReservation;
    }

    public function getProductState() {
        return $this->productState;
    }

    public function setProductState($productState) {
        $this->productState = $productState;
    }

    public function getCurrentAgreement() {
        return $this->currentAgreement;
    }

    public function setCurrentAgreement($currentAgreement) {
        $this->currentAgreement = $currentAgreement;
    }
}
?>