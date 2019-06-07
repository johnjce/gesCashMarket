<?php
class MainModel extends MainEntity {
    private $table;
    private $fluent;
    
    public function __construct($table, $adapter) {
        $this->table=(string) $table;
        parent::__construct($table, $adapter);
        $this->fluent=$adapter;
    }
    
    public function fluent(){
        return $this->fluent;
    }
    
    public function executeSQL($query){
        $query=$this->fluent()->query($query);
        if($query==true){
            if($query->num_rows>1){
                while($row = $query->fetch_object()) {
                   $resultSet[]=$row;
                }
            }elseif($query->num_rows==1){
                if($row = $query->fetch_object()) {
                    $resultSet[]=$row;
                }
            }else{
                $resultSet=true;
            }
        }else{
            $resultSet=false;
        }
        return $resultSet;
    }
}
?>


