<?php
require_once 'views/ingreso.php';
require_once 'config/params.php';
require_once 'config/Conexion.php';
require 'helpers/utils.php';
// $con= new Conexion;
// $con->conectar();
// var_dump($con);
// Obtén la URL solicitada
$url = $_SERVER['REQUEST_URI'];
// Elimina cualquier parámetro de la URL
$url = strtok($url, '?');

// Requerir el archivo 'utils.php' para tener acceso a las funciones y rutas


// Verificar y redireccionar la URL
// redirect($url);
require_once 'views/includes/layouts/footer_standar.php';