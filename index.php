<?php

require_once 'config/global.php';
require_once 'core/MainController.php';
require_once 'core/FrontController.func.php';

if (isset($_GET["controller"])) {
    $controllerObj = LoadController($_GET["controller"]);
} else {
    $controllerObj = LoadController(DEFAULT_CONTROLLER);
}
LaunchAction($controllerObj);
