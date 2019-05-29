<?php
class PurchaseModel extends MainModel {
    
    private $table;
    
    public function __construct($adapter){
        $this->table="productos";
        parent::__construct($this->table, $adapter);
    }

}
?>