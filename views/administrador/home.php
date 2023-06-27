<?php
/*require_once '../../../index.php';
require_once '../../config/params.php';
require_once '././config/Conexion.php';*/
$file = dirname(__FILE__,2)."/includes/layouts/"; 
require_once 'controllers/administradorcontroller.php';
require_once $file.'header_standar.php';

?>
<div class="container_index">
    
</div>
<?php
require_once $file.('footer_standar.php');
?>
