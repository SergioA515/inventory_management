<?php
session_start();
$file01 = dirname(__FILE__,2)."/includes/layouts/";
$file02 = dirname(__FILE__,3)."/controllers/"; 
require_once $file01.'header_standar.php';
require_once $file02.'administradorcontroller.php';
require_once '../config/Conexion.php';
require_once '../config/params.php';
?>
<div class="container_index">
    
</div>
<?php
require_once $file.('footer_standar.php');
?>
