<?php
//$controller=dirname(__DIR__,2).'/controllers/';
$config=dirname(__DIR__,2).'/config/';
$view=dirname(__DIR__,2).'/views/';
require_once $config.'params.php';
require_once $config.'Conexion.php';
require_once $view.'/includes/layouts/header_standar.php';
//var_dump($view);
//die();
//require_once $controller.'productocontroller.php';

?>
<div class="container-query">
    <div class="container-control">
        <?php require_once $view.'/productos/form_control_producto.php'; ?>
    </div>
    <?php
    // $prodController=new ProductoController;
    // $prodController->verProductos();
    require_once $view.'/includes/tables/tabla_productos.php';
    //var_dump($view);
    echo'<h1>Si sali a producto xd</h1>';
    ?>
</div>
<?php
require_once $view.'/includes/layouts/footer_standar.php';
?>