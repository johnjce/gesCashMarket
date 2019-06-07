<?php

function LoadController($controller){
    $controller=ucwords($controller).'Controller';
    $strFileController='controllers/'.$controller.'.php';
    
    if(!is_file($strFileController)){
        $strFileController='controllers/'.ucwords(DEFAULT_CONTROLLER).'Controller.php';
    }
    require_once $strFileController;
    return new $controller();
}

function LoadAction($controllerObj,$action){
    $controllerObj->$action();
}

function LaunchAction($controllerObj){
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
        LoadAction($controllerObj, $_GET["action"]);
    }else{
        LoadAction($controllerObj, DEFAULT_ACTION);
    }
}

?>
