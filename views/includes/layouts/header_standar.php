<?php 
$productos = dirname(__DIR__,2).'/productos/';
$proveedores = dirname(__DIR__,2).'/proveedores/';
$asociados = dirname(__DIR__,2).'/mayoristas/';
// require_once $productos.'consulta_producto.php';
// require_once $proveedores.'consulta_proveedor.php';
// require_once $asociados.'consulta_mayorista.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/public/css/style.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <div class="header-reduce">
        <nav>
        <span id="open-close"><i class='bx bx-menu'></i></span>
        </nav>
    </div>
    <div class="container">
        <div id="aside">
            <div class="container-text">
                <div>
                    <a href="" class=""><span>Home</span></a>
                </div>
            </div>
            <div class="container-text">
                <div>
                <a href="consulta_producto.php" class=""><span>Productos</span></a>
                </div>
            </div>
            <div class="container-text">
                <div>
                <a href="" class=""><span>Proveedores</span></a>
                </div>
            </div>
            <div class="container-text">
                <div>
                <a href="" class=""><span>Asociados</span></a>
                </div>
            </div>
        </div>
        <script src="/public/js/script.js"></script>