<?php
// Aquí trabajaremos el login y la sesión del administrador en la app;
require_once('../models/Administrador.php');
require_once('../models/SeguridadAdministrador.php');
class AdministradorController {
    public function log_in() {
        echo 'El método log_in() se está ejecutando';
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
                echo '<h1>Usuario o contraseña inválidos</h1>';
                return;
            }
            // credenciales corectas
            $_SESSION['nombre'] = $usuario;
            var_dump($_SESSION);
            // Redirigir a la página de inicio del sistema
            header('Location: ' . url_init . '/views/administrador/home.php');
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