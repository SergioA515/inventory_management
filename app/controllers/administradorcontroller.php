<?php
// Aquí trabajaremos el login y la sesión del administrador en la app;
require_once('models/Administrador.php');
class AdministradorController{

    public function validacion_ingreso(){
        if (isset($_POST)){
            $usuario = $_POST['usuario'];
            $contrasenia = $_POST['usuario'];
            
        }
    }

}
?>