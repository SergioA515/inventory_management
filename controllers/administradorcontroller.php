<?php
// Aquí trabajaremos el login y la sesión del administrador en la app;
session_start();
require_once '../config/Conexion.php';
require_once '../params.php';
require_once '../models/Administrador.php';
require_once '../views/administrador/home.php';
class AdministradorController {
    public function log_in() {
        // Verificar si se envió el formulario de inicio de sesión
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $contrasenia = $_POST['contrasenia'];
            
            // Crear una instancia de Administrador
            $administrador = new Administrador();
            
            // Intentar iniciar sesión
            $autenticacionAdm = $administrador->log_in($usuario, $contrasenia);
            
            if ($autenticacionAdm !== null) {
                // Inicio de sesión exitoso
                $_SESSION['usuario'] = $usuario;
                // Redirigir a la página de inicio del sistema
                header('location: home.php');
                exit();
            } else {
                // Las credenciales son inválidas
                echo '<h1>Usuario o contraseña incorrectos</h1>';
            }
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