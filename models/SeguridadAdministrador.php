<?php
include_once ('../config/Conexion.php');
class SeguridadAdministrador {
    public function verificacion($usuario,$contrasenia){
        $db=new Conexion;
        $sql="SELECT adm_usuario, adm_contrasenia FROM administradores WHERE adm_usuario = ?";

        $db->conectar();
        $con=$db->preparar_consulta($sql,[$usuario]);

        if ($con && count($con)>0){
            $administradorDB=$con[0];
            //var_dump($administradorDB);
            if (password_verify($contrasenia, $administradorDB['adm_contrasenia'])){
                error_log('SeguridadAdmin parece funcionar');
                $db->desconectar();
                return [$administradorDB['adm_usuario'],$administradorDB['adm_contrasenia']]; 
            }
        }
        $db->desconectar();
        return null;
    }
}