<?php
session_start();
require_once ('config/params.php');
require_once('config/Conexion.php');
require_once('views/ingreso.php');
require_once('views/includes/layouts/header_standar.php');
?>
<div class="container_index">
    <?php 
        require_once('views/includes/tables/tabla_mayoristas.php');
    ?>
</div>
<?php
require_once('views/includes/layouts/footer_standar.php');
?>