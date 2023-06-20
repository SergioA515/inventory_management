<?php
require_once('Conexion.php');
class SeguridadAdministrador {
    public $log_sesion=false;

    public function verificacion($usuario,$contrasenia){
        $db=new Conexion;
        $sql="SELECT usuario, contrasenia FROM administrador WHERE usuario = ?";
        $con=$db->preparar_consulta($sql,[$usuario]);
        $administradorDB=$con[0];
        // $usuario = $_SESSION['usuario'];
        // $contrasenia = $_SESSION['contrasenia'];
        if (!($administradorDB && password_verify($contrasenia, $administradorDB['contrasenia']))){
            return $this->log_sesion=false; 
        }
        return $this->log_sesion=true;
    }
}