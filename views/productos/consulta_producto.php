<?php
$view=dirname(__DIR__,2).'/views/';
$config=dirname(__DIR__,2).'/config/';
require_once $config.'params.php';
require_once $config.'Conexion.php';
require_once $view.'includes/layouts/header_standar.php';
//require_once $view.'ingreso.php';
?>
<div class="container_index">
    <?php 
    require_once('views/includes/tables/tabla_productos.php');
    echo'<h1>Si sali a producto xd</h1>';
    ?>
</div>
<?php
require_once $view.'includes/layouts/footer_standar.php';
?>