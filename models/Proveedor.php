<?php 
include_once ('Conexion.php');
class Proveedor extends Conexion{
    private $id;
    private $nombre;
    private $direccion;
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
    public function createProveedor(){
        if(isset($_POST['proveedor'])){
            try{
                $nombre=$_POST['nombre'];
                $direccion=$_POST['direccion'];
                $sql='INSERT INTO `Proveedores`(prov_nombre, prov_direccion)VALUES(?,?)';
                $con=$this->preparar_consulta($sql,[$nombre,$direccion]);
                parent::desconectar();
            }catch(Exception $err){
                echo($err->getMessage());
            }
        }
    }
    public function selectProveedorNombre($nombre){
        try{
            $nombre=$_POST['nombre'];
            $sql='SELECT * FROM `Proveedores` WHERE `prov_nombre`=?';
            $con=$this->preparar_consulta($sql,[$nombre]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function updateProveedor(){
        try{
            $nombre=$_POST['nombre'];
            $direccion=$_POST['direccion'];
            $sql='UPDATE`Proveedores`SET `prov_nombre`=?,`prov_direccion`=? WHERE `prov_nombre`='.$nombre;;
            $con=$this->preparar_consulta($sql,[$nombre,$direccion]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function deleteProveedor(){
        try{
            $nombre=$_POST['nombre'];
            $sql='DELETE FROM `Proveedores` WHERE `prov_nombre`=?';
            $con=$this->preparar_consulta($sql,[$nombre]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
}
?>