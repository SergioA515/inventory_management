<?php
session_start();
// Aquí trabajaremos el login y la sesión del administrador en la app;
$view=dirname(__DIR__,1).'/views/';
$model=dirname(__DIR__,1).'/models/';
$config=dirname(__DIR__,1).'/config/';
include_once $model.'Administrador.php';
require_once $model.'SeguridadAdministrador.php';
require_once $view.'administrador/home.php';
include_once $config.'params.php';
die();
class AdministradorController {
    public function log_in($usuario,$contrasenia) {
        // Verificar si se envió el formulario de inicio de sesión
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $contrasenia = $_POST['contrasenia'];

            // Crear una instancia del Autenticador
            $autenticador = new SeguridadAdministrador();
            $validacion = $autenticador->verificacion($usuario, $contrasenia);
            // Verificar las credenciales
            if ($validacion) {
                echo '<h1>Si valido</h1>';
                //Sesion existosa
                $_SESSION['usuario'] = $usuario;
                if (isset($_SESSION['usuario'])) {
                    //$Administrador = new Administrador;
                    // Inicio de sesión exitoso, redirigir a la página de inicio del sistema
                    //requireClassFile(url_init .$Administrador.'/administradorcontroller/'.'.php');
                    //redirect(url_init .$Administrador.'/administradorcontroller/'.'.php');
                    header('Location:views\administrador\home.php');
                    echo '<h1>Si entro a sesion exitosa</h1>';
                } else {
                    // Las credenciales son inválidas
                    var_dump($validacion);
                    var_dump($usuario);
                    var_dump($contrasenia);
                    echo '<h1>Usuario o contraseña incorrectos</h1>';
                }
            }
            var_dump($_SESSION['usuario']);
            echo '<h1>Si entro y salio de login</h1>';
        }
    }
    
    public function log_out() {
        // Crear una instancia de SeguridadAdministrador
        $administrador = new Administrador();

        // Cerrar la sesión del administrador
        //$administrador->log_out();
    }
}
?>