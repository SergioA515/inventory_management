<?php
$config=dirname(__DIR__,1).'/config/';
//$controller=dirname(__DIR__,1).'/controllers/';
include_once $config.'Conexion.php';
//require_once $controller.'administradorcontroller.php';
class SeguridadAdministrador {
    public function verificacion($usuario, $contrasenia) {
        $db = new Conexion();
        $sql = "SELECT adm_contrasenia FROM administradores WHERE adm_usuario = ?";

        $db->conectar();
        $con = $db->preparar_consulta($sql, [$usuario]);
        $cont = count($con);
        //Evaluar el numero de filas para entrar a condicionar
        if ($cont > 0) {
            $passDB = $con[0];
            $hash = $passDB['adm_contrasenia'];
            
            // Verificar la contraseña utilizando password_verify
            if (password_verify($contrasenia, $hash)) {
                echo '<h1>eeeeeeeeeerrror</h1>';
                $db->desconectar();
                return true; // Validación exitosa
            }
        }else{
            $db->desconectar();
            echo '<h1>eeeeeeeeeerrror false</h1>';
            return false;
        }
        
        var_dump($cont);
        var_dump(password_verify($hash, $contrasenia));
        var_dump($hash);
        var_dump($contrasenia);
        var_dump($con[0]);

        
    }
    /* public function verificacion($usuario, $contrasenia) {
        $db = new Conexion();
        $sql = "SELECT adm_contrasenia FROM administradores WHERE adm_usuario = ?";

        $db->conectar();
        $con = $db->preparar_consulta($sql, [$usuario]);

        if (count($con) > 0) {
            $administradorDB = $con[0];
            $hash = $administradorDB['adm_contrasenia'];
            
            // Verificar la contraseña utilizando password_verify
            if (password_verify($contrasenia, $hash)) {
                $db->desconectar();
                return true; // Validación exitosa
            }
        }

        $db->desconectar();
        return false;
    */
}
