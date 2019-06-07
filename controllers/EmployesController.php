<?php
class EmployesController extends MainController {
    public $connect;
    public $adapter;
    public $employe;

    public function __construct() {
        parent::__construct();
        $this->connect = new connect();
        $this->adapter = $this->connect->connection();
    }
    
    public function login() {
        $this->employe = new EmployesModel($this->adapter);
        if (isset($_POST["user"]) && isset($_POST["pass"])) {
            $user = $_POST["user"];
            $pass = $_POST["pass"];
            $employeBD = $this->employe->getPassByUser($user);
            if (password_verify($pass, $employeBD[0]->pass) === TRUE) {
                $_SESSION['loggedin'] = true;
                $_SESSION['user'] = $_POST['user'];
                $_SESSION['employe'] = $this->employe;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (60 * 60 * 1);//1Hora
                $this->redirect("Purchase", "seePurchases");
            } else {
                $this->view("login", array("error" => "Error usuario o contraseña erroneas."));
            }
        }
        $this->view("login", array());
    }

    public function logout() {
        if(isset($_SESSION['user'])){
            $_SESSION['loggedin'] = false;
            session_unset($_SESSION['user']);
            session_unset($_SESSION['employe']);
            session_destroy();
        }
        $this->view("login", array());
    }
}
