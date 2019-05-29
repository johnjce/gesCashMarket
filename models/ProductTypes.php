<?php
class ProductTypes extends MainEntity {
    
    private $id;
    private $type;
    private $comment;

    public function __construct($adapter) {
        $table="producttypes";
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

    public function getComment() {
        return $this->comment;
    }

    public function setComment($comment) {
        $this->comment = strtolower($comment);
    }
}
?>