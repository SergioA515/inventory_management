<?php
class SeguridadAdministrador extends Conexion implements \app\Interfaces\sessionInterface{
    private $log_sesion=false;

    public function verificacion($usuario,$contrasenia){
        $sql="SELECT usuario, contrasenia FROM administrador WHERE usuario = ?";
        $con=$this->preparar_consulta($sql,[$usuario]);
        $administrador=$con[0];
        // $usuario = $_SESSION['usuario'];
        // $contrasenia = $_SESSION['contrasenia'];
        if (!($administrador && password_verify($contrasenia, $administrador['contrasenia']))){
            return $this->log_sesion=false; 
        }
        return $this->log_sesion=true;
    }
    public function log_in(){
        if (!($this->log_sesion==true)){
            echo('Acceso Denegado');
        }
        header('location:index.php');
        exit();
    }
    public function log_out(){
        session_unset();
        session_destroy();
        header('Location:/ingreso.php');
        exit();
    }
}