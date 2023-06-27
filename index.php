<?php
session_start();
require_once('autoload.php');
// require_once('config/conexion.php');
require_once('config/params.php');
require_once('helpers/utils.php');
require_once('views/controller.php');

if(isset($_GET['controller'])){
    $controller_name = $_GET['controller'];
}
elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $controller_name = controler_default;
    
}
else {
    $error = new errorController();
    $error->index();
    exit();
}
$view = new viewController;
//instanciar el header del content

$header = $view->encabezado($controller_name);

if(class_exists($controller_name)){
    $controller = new $controller_name();
    if(isset($_GET['action']) && method_exists($controller,$_GET['action'])){
        $action =  $_GET['action'];
        $controller->$action();
    }elseif(!isset($_GET['action'])){
        $default = action_default;
        $controller->$default();
    }
    else{
        $error = new errorController();
        $error->index();
    }

}else {
    $error = new errorController();
    $error->index();
} 
die;

//footer
$footer = $view->footer();