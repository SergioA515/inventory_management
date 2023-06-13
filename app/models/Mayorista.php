<?php 
include_once ('Conexion.php');
class Mayorista extends Conexion{
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
    public function createMayorista(){
        if(isset($_POST['mayorista'])){
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
    public function selectMayoristaNombre($nombre){
        try{
            $nombre=$_POST['nombre'];
            $sql='SELECT * FROM `Mayoristas` WHERE `pro_nombre`=?';
            $con=$this->preparar_consulta($sql,[$nombre]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function updateMayorista(){
        try{
            $nombre=$_POST['nombre'];
            $direccion=$_POST['direccion'];
            $sql='UPDATE`Mayoristas`SET `may_nombre`=?,`may_direccion`=? WHERE `may_nombre`='.$nombre;
            $con=$this->preparar_consulta($sql,[$nombre,$direccion]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function deleteMayorista(){
        try{
            $nombre=$_POST['nombre'];
            $sql='DELETE FROM `Mayorista` WHERE `may_nombre`=?';
            $con=$this->preparar_consulta($sql,[$nombre]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
}
?>