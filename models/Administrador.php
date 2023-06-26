<?php 
include_once '../config/Conexion.php';
include_once '../models/SeguridadAdministrador.php';
class Administrador {
    private $id;
    private $nombre;
    private $apellido;
    private $usuario;
    private $contrasenia;
    private $direccion;
    private $correo;

    public function __construct($nombre='',$apellido='',$usuario='',$contrasenia='',$direccion='',$correo=''){
        $this->nombre=$nombre;
        $this->direccion=$direccion;
        $this->correo=$correo;
        $this->apellido=$apellido;
        $this->usuario=$usuario;
        $this->contrasenia=$contrasenia;
    }
    // getters & setters
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getContrasenia() {
        return $this->contrasenia;
    }

    public function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }

    // - end 
    public function __get($propiedad)
    {
        if(!property_exists($this,$propiedad)){
            throw new Exception('Propiedad no existente');
        }
        return $this->$propiedad;
        
    }
    public function __set($propiedad, $valor){
        if(!property_exists($this,$propiedad)){
            throw new Exception('Propiedad Inexistente');
        }
        $this->$propiedad=$valor;    
    }
    public function createAdministrador(){
        if(isset($_POST['administrador'])){
            try{
                $nombre=$_POST['nombre'];
                $apellido=$_POST['apellido'];
                $usuario=$_POST['usuario'];
                $contrasenia=$_POST['contrasenia'];
                $direccion=$_POST['direccion'];
                $correo=$_POST['correo'];
                $contrasenia = password_hash($contrasenia, PASSWORD_BCRYPT);
                $db=new Conexion;
                $db->conectar();
                $sql='INSERT INTO `administradores`(adm_nombre,adm_apellido,adm_usuario,adm_contraseni,adm_direccion,adm_correo)VALUES(?,?,?,?,?,?)';
                $db->preparar_consulta($sql,[$nombre,$apellido,$usuario,$contrasenia,$direccion,$correo]);
                $db->desconectar();
            }catch(Exception $err){
                echo($err->getMessage());
            }
        }
    }
    public function selectAdministradorNombre($nombre){
        try{
            $db=new Conexion;
            $sql='SELECT * FROM `administradores` WHERE `adm_nombre`=?';
            $db->conectar();
            $db->preparar_consulta($sql,[$nombre]);
            $db->desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    
    public function updateAdministrador(){
        try{
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $usuario=$_POST['usuario'];
            $direccion=$_POST['direccion'];
            $correo=$_POST['correo'];
            $db=new Conexion;
            $sql='UPDATE `administradores` SET `adm_nombre`=?,`adm_apellido`=?,`adm_usuario`=?,`adm_direccion`=?,`adm_correo`=? WHERE `adm_nombre`=?';
            $db->conectar();
            $db->preparar_consulta($sql,[$nombre,$apellido,$usuario,$direccion,$correo]);
            $db->desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    
    public function deleteAdministrador(){
        try{
            $nombre=$_POST['nombre'];
            $db=new Conexion;
            $sql='DELETE FROM `administradores` WHERE `adm_nombre`=?';
            $db->conectar();
            $db->preparar_consulta($sql,[$nombre]);
            $db->desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function log_in($usuario,$contrasenia){
        $autenticacionAdm = null;
        try {
            $autenticacion = new SeguridadAdministrador;
            $autenticacionAdm = $autenticacion->verificacion($usuario, $contrasenia);
            if ($autenticacionAdm !== null && $autenticacionAdm["adm_usuario"] === $usuario && password_verify($contrasenia, $autenticacionAdm["adm_contrasenia"])) {
                $usuarioDB = $autenticacionAdm["adm_usuario"];
                $contraseniaDB = $autenticacionAdm["adm_contrasenia"];
                if (password_verify($contrasenia, $contraseniaDB)) {
                    $_SESSION['usuario'] = $usuario;
                    return $autenticacionAdm;
                }
            }
        } catch (Error $err) {
            var_dump($autenticacionAdm);
            echo 'Pinche intruso culero ';
            echo $err->getMessage();
        }
        return null;
    }
    public function log_out(){
        session_unset();
        session_destroy();
        header('location:/views/ingreso.php');
        exit();
    }
    public function __toString(){
        return self::class.$this->usuario;
    }
}
?>