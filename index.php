<?php
session_start();
require_once ('config/params.php');
require_once('config/Conexion.php');
require_once('views/ingreso.php');
require_once('helpers/utils.php');

/* Vamos a disponer de esta información para su uso eventual:
// Obtén la URL solicitada
$url = $_SERVER['REQUEST_URI'];

// Elimina cualquier parámetro de la URL
$url = strtok($url, '?');

// Requerir el archivo 'utils.php' para tener acceso a las funciones y rutas
require_once('helpers/utils.php');

// Verificar y redireccionar la URL
redirect($url);
*/
require_once('views/includes/layouts/footer_standar.php');