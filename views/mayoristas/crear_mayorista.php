<?php
// session_start();
// require_once 'config/params.php';
// require_once 'config/Conexion.php';
// require_once 'views/ingreso.php';
// require_once 'views/includes/layouts/header_standar.php';
$view=dirname(__DIR__,1).'/includes/';
$config=dirname(__DIR__,2).'/config/';
require_once $config.'params.php';
require_once $config.'Conexion.php';
require_once $view.'/layouts/header_standar.php';
require_once $view.'/layouts/head.php';
?>
<div class="container-query">
    <?php 
    require_once $view.'tables/tabla_mayoristas.php';
    var_dump($view);
    echo'<h1>Si sali a mayorista xd</h1>';
    ?>
</div>
<?php
require_once $view.'layouts/footer_standar.php';
?> 