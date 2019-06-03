<?php
class CustomerController extends MainController{
    public $connect;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
        $this->connect=new connect();
        $this->adapter=$this->connect->connection();
    }
    
    public function index(){
        $customers=new Customer($this->adapter);
        $allcustomers=$customers->getAll();
        
        $this->view("index",array(
            "allcustomers"=>$allcustomers
        ));
    }
    
    public function save(){
        $customers=new CustomersModel($this->adapter);
        $customer=new Customer($this->adapter);
        $customer->setDni($_POST['dni']);
        $customer->setName($_POST['names']);
        $customer->setLastname($_POST['lastname']);
        $customer->setAddress($_POST['address']);
        $customer->setTelephone($_POST['telephone']);
        $customer->setEmail($_POST['email']);
        $customer->setDni($_POST['dni']);
        $customer->setImgDni($_POST['img_dni']);
        $customer->setSignaturePicture($_POST['signaturePicture']);
        if(!isset($_POST["id"]) || $_POST["id"] == "")
            return $customers->addCustomer($customer);
        else {
            $customer->setId($_POST['id']);
            return $customers->updateCustomer($customer);
        }
    }

    public function getCustomerById(){
        if(isset($_POST['id']) && $_POST['id'] != ""){
            $customer=new Customer($this->adapter);
            return $customer->getById($_POST['id']);
        }
    }
    
    public function delCustomer(){ 
        //editar
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];    
            $customer=new Customer($this->adapter);
            if($customer->deleteById($id)){
                $this->redirect();
            }else{
                echo "Error: NO se borr&oacute;, Revise si tiene contratos o productos relacionados e intentelo de nuevo.";
            }
        }else{
            echo "Error: es necesario un ID de customere para borrar.";
        }
    }

    public function seeCustomers(){
        $customers=new Customer($this->adapter);
        $allcustomers=$customers->getAll();

        $this->view("SeeCustomers",array(
            "allcustomers"=>$allcustomers
        ));
    }

    public function createCustomer(){
        $this->view("addCustomer",null);
    }

    public function updateCustomer(){
        $customers=new Customer($this->adapter);
        $customer=$customers->getById($_GET["id"]);

        $this->view("addCustomer",array(
            "customer"=>$customer
        ));
    }

    public function search(){
        $customers=new CustomersModel($this->adapter);
        $customerResult = $customers->search($_POST['value']);
        echo json_encode($customerResult);
    }

}
