<?php
class ClientsModel extends MainModel{
    private $table;
    
    public function __construct($adapter){
        $this->table="clients";
        parent::__construct($this->table, $adapter);
    }
}
?>
