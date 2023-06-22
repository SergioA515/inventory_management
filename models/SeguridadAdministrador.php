<?php
include_once ('../config/Conexion.php');
class SeguridadAdministrador {
    public $log_sesion=false;

    public function verificacion($usuario,$contrasenia){
        $db=new Conexion;
        $sql="SELECT adm_usuario, adm_contrasenia FROM administrador WHERE adm_usuario = ?";
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