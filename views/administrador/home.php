<?php
$layout = dirname(__FILE__,2)."/includes/layouts/";
$controller = dirname(__FILE__,3)."/controllers/"; 
$config = dirname(__FILE__,3)."/config/"; 
require_once $layout.'header_standar.php';
require_once $controller.'administradorcontroller.php';
require_once $config.'Conexion.php';
require_once $config.'params.php';
?>
<div class="container_index">
    
</div>
<?php
require_once $layout.('footer_standar.php');
?>
