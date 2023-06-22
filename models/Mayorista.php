<?php 
include_once ('../config/Conexion.php');
class Mayorista{
    private $id;
    private $nombre;
    private $direccion;
    private $db;
 
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
                $this->db->preparar_consulta($sql,[$nombre,$direccion]);
                $this->db->desconectar();
            }catch(Exception $err){
                echo($err->getMessage());
            }
        }
    }
    public function selectMayoristaNombre($nombre){
        try{
            $nombre=$_POST['nombre'];
            $sql='SELECT * FROM `Mayoristas` WHERE `pro_nombre`=?';
            $this->db->preparar_consulta($sql,[$nombre]);
            $this->db->desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function updateMayorista(){
        try{
            $nombre=$_POST['nombre'];
            $direccion=$_POST['direccion'];
            $sql='UPDATE`Mayoristas`SET `may_nombre`=?,`may_direccion`=? WHERE `may_nombre`='.$nombre;
            $this->db->preparar_consulta($sql,[$nombre,$direccion]);
            $this->db->desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function deleteMayorista(){
        try{
            $nombre=$_POST['nombre'];
            $sql='DELETE FROM `Mayorista` WHERE `may_nombre`=?';
            $this->db->preparar_consulta($sql,[$nombre]);
            $this->db->desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function selectAll(){
        try{
            $sql='SELECT may_nombre,may_direccion FROM mayoristas';
            $results = $this->db->preparar_consulta($sql,[]);
            $mayoristas=[];
            foreach($results as $mayorista){
                $nombre=$mayorista['may_nombre'];
                $direccion=$mayorista['may_direccion'];

                $mayoristas[]=[
                    'nombre'=>$nombre,
                    'direccion'=>$direccion
                ];
            }
            $this->db->desconectar();
            return $mayoristas;
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
}
?>