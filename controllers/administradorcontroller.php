<?php
// Aquí trabajaremos el login y la sesión del administrador en la app;
require_once('models/Administrador.php');
class AdministradorController {
    public function log_in() {
        // Verificar si se envió el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $usuario = $_POST['usuario'];
            $contrasenia = $_POST['contrasenia'];

            // Crear una instancia de SeguridadAdministrador
            
            $seguridad = new SeguridadAdministrador();

            // Verificar las credenciales del administrador
            if (!$seguridad->verificacion($usuario, $contrasenia)) {
                // Las credenciales son inválidas, mostrar un mensaje de error
                echo 'Usuario o contraseña inválidos';
            }
            // Las credenciales son válidas, redirección del Administrador a la página de inicio
            $administrador = new Administrador();
            $sesion=$administrador->log_in();
            // Redirigir al administrador a la página de inicio
            header('location:'.url_init.'/views/home.php');
            exit();
        }
    }

    public function log_out() {
        // Crear una instancia de SeguridadAdministrador
        $administrador = new Administrador();

        // Cerrar la sesión del administrador
        $administrador->log_out();
    }
}
?>