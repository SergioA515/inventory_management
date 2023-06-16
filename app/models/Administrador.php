<?php 
include_once ('Conexion.php');
class Administrador extends Conexion{
    private $id;
    private $nombre;
    private $apellido;
    private $usuario;
    private $contrasenia;
    private $direccion;
    private $correo;

    public function __construct($nombre,$apellido,$usuario,$contrasenia,$direccion,$correo){
        $this->nombre=$nombre;
        $this->direccion=$direccion;
        $this->correo=$correo;
        $this->apellido=$apellido;
        $this->usuario=$usuario;
        $this->$contrasenia=$contrasenia;
    }
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
                $direccion=$_POST['direccion'];
                $correo=$_POST['correo'];
                $apellido=$_POST['apellido'];
                $usuario=$_POST['usuario'];
                $contrasenia=$_POST['contrasenia'];
                $contrasenia = password_hash($contrasenia, PASSWORD_BCRYPT);
                $sql='INSERT INTO `administradores`(adm_nombre,adm_apellido,adm_usuario,adm_contraseni,adm_direccion,adm_correo)VALUES(?,?,?,?,?,?)';
                $con=$this->preparar_consulta($sql,[$nombre,$apellido,$direccion,$correo,$usuario,$contrasenia]);
                parent::desconectar();
            }catch(Exception $err){
                echo($err->getMessage());
            }
        }
    }
    public function selectAdministradorNombre($nombre){
        try{
            $nombre=$_POST['nombre'];
            $sql='SELECT * FROM `administradores` WHERE `adm_nombre`=?';
            $con=$this->preparar_consulta($sql,[$nombre]);
            parent::desconectar();
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
            $sql='UPDATE`administradores`SET `adm_nombre`=?,`adm_apellido`=?,`adm_usuario`=?,`adm_direccion`=?,`adm_correo`=? WHERE `adm_nombre`='.$nombre;;
            $con=$this->preparar_consulta($sql,[$nombre,$apellido,$usuario,$direccion,$correo]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function deleteAdministrador(){
        try{
            $nombre=$_POST['nombre'];
            $sql='DELETE FROM `administradores` WHERE `adm_nombre`=?';
            $con=$this->preparar_consulta($sql,[$nombre]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function __toString(){
        return self::class.$this->usuario;
    }
}
?>