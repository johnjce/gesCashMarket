<?php
class lrvd extends MainEntity {
    
    private $id;
    private $IDCL;
    private $amount;
    private $date;
    private $endDate;
    private $typeTicket;
    private $comment;
    private $typeDocument;
    private $documentId;
    private $adapter;

    public function __construct($adapter) {
        $table="lrvd";
        $this->adapter = $adapter;
        parent::__construct($table,$adapter);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }    

    public function getIDCL() {
        $customer = new Customer($this->adapter);
        return $customer.getById($this->IDCL);
    }

    public function setIDCL($IDCL) {
        $this->IDCL = $IDCL;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    public function getTypeTicket() {
        return $this->typeTicket;
    }

    public function setTypeTicket($typeTicket) {
        $this->typeTicket = $typeTicket;
    }

    public function getComment() {
        return $this->comment;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }
        
    public function getTypeDocument() {
        return $this->typeDocument;
    }

    public function setTypeDocument($typeDocument) {
        $this->typeDocument = $typeDocument;
    }

    public function getDocumentId() {
        return $this->documentId;
    }

    public function setDocumentId($documentId) {
        $this->documentId = $documentId;
    }
}