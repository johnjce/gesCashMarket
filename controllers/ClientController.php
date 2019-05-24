<?php
class ClientController extends MainController{
    public $connect;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
        $this->connect=new connect();
        $this->adapter=$this->connect->connection();
    }
    
    public function index(){
        $clients=new Client($this->adapter);
        $allusers=$clients->getAll();
        
        $this->view("index",array(
            "allusers"=>$allusers
        ));
    }
    
    public function crear(){
        if(isset($_POST["nombre"])){
            //editar
            $client=new Client($this->adapter);
            $client->setNombre($_POST["nombre"]);
            $client->setApellido($_POST["apellido"]);
            $client->setEmail($_POST["email"]);
            $client->setPassword(sha1($_POST["password"]));
            $save=$client->save();
        }
        $this->redirect("Client", "index");
    }
    
    public function borrar(){ 
        //editar
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];    
            $client=new Client($this->adapter);
            if($client->deleteById($id)){
                $this->redirect();
            }else{
                echo "Error: NO se borr&oacute;, Revise si tiene contratos o productos relacionados e intentelo de nuevo.";
            }
        }else{
            echo "Error: es necesario un ID de cliente para borrar.";
        }
    }

}
?>
