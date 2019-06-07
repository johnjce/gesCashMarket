<?php
class MainController {

    public function __construct() {
        require_once 'Connect.php';
        require_once 'MainEntity.php';
        require_once 'MainModel.php';

        foreach (glob("models/*.php") as $file) {
            require_once $file;
        }
    }

    public function view($view, $dates) {
        foreach ($dates as $id_assoc => $value) {
            ${$id_assoc} = $value;
        }
        require_once 'core/ViewsHelper.php';
        $helper = new ViewsHelper();
        require_once "views/baseTemplate/header.php";
        if($view!="login"){
            require_once "views/baseTemplate/leftBar.php";
            require_once "views/baseTemplate/topBar.php";
        }
        require_once 'views/' . $view . 'View.php';
        require_once "views/baseTemplate/footer.php";
    }

    public function redirect($controller = DEFAULT_CONTROLLER, $action = DEFAULT_ACTION) {
        header("Location:index.php?controller=" . $controller . "&action=" . $action);
    }
}
