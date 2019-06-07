<?php
class Connect {
    private $driver;
    private $host, $conUser, $conPass, $database, $charset;

    public function __construct() {
        $db_cfg = require_once 'config/database.php';
        $this->driver = $db_cfg["driver"];
        $this->host = $db_cfg["host"];
        $this->conUser = $db_cfg["user"];
        $this->conPass = $db_cfg["pass"];
        $this->database = $db_cfg["database"];
        $this->charset = $db_cfg["charset"];
    }
    
    public function connection() {
        $con = new mysqli($this->host, $this->conUser, $this->conPass, $this->database);
        if ($con->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
        }
        $con->query("SET NAMES '" . $this->charset . "'");
        return $con;
    }
}
