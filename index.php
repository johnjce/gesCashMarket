<?php
session_start();
require_once 'config/global.php';
require_once 'core/MainController.php';
require_once 'core/FrontController.func.php';
//$controllerObj = LoadController(DEFAULT_CONTROLLER);
if (isset($_SESSION["loggedin"]) || (isset($_GET["controller"]) && $_GET["controller"] == "Employes")) {
    if (isset($_GET["controller"])) {
        $controllerObj = LoadController($_GET["controller"]);
    } else {
        $controllerObj = LoadController(DEFAULT_CONTROLLER);
    }
}
LaunchAction($controllerObj);
