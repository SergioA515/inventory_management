<?php 
require_once 'head.php';
$productos = dirname(__DIR__,2).'/productos/';
$proveedores = dirname(__DIR__,2).'/proveedores/';
$asociados = dirname(__DIR__,2).'/mayoristas/';
$dir=dirname(__DIR__);
// require_once $productos.'consulta_producto.php';
// require_once $proveedores.'consulta_proveedor.php';
// require_once $asociados.'consulta_mayorista.php';
?>
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
                    <a href="../administrador/home.php" class=""><span>Home</span></a>
                </div>
            </div>
            <div class="container-text">
                <div>
                <a href="../productos/crear_producto.php" class=""><span>Productos</span></a>
                </div>
            </div>
            <div class="container-text">
                <div>
                <a href="../proveedores/crear_proveedores.php" class=""><span>Proveedores</span></a>
                </div>
            </div>
            <div class="container-text">
                <div>
                <a href="../mayoristas/crear_mayorista.php" class=""><span>Asociados</span></a>
                </div>
            </div>
        </div>
    </div>
    