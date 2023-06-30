<?php
$config=dirname(__DIR__,2).'/config/';
$view=dirname(__DIR__,2);
$formLocation=dirname(__DIR__,1).'/productos/';
require_once $config.'params.php';
require_once $config.'Conexion.php';
require_once $view.'/views/includes/layouts/header_standar.php';
var_dump($formLocation);
?>

<div class="container-query">
<?php
    require_once $formLocation.'form_editar_producto.php';
?>
</div>
<?php
require_once $view.'/views/includes/layouts/footer_standar.php';
?>