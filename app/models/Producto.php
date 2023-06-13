<?php 
include_once ('Conexion.php');
class Producto extends Conexion{
    private $id;
    private $nombre;
    private $precio;
    private $cantidad_disponible;
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
    public function createProducto(){
        if(isset($_POST['producto'])){
            try{
                $nombre=$_POST['nombre'];
                $precio=$_POST['precio'];
                $cantidad_disponible=$_POST['cantidad_disponible'];
                $sql='INSERT INTO `productos`(pro_nombre, pro_precio, pro_cantidad_disponible)VALUES(?,?,?)';
                $con=$this->preparar_consulta($sql,[$nombre,$precio,$cantidad_disponible]);
                parent::desconectar();
            }catch(Exception $err){
                echo($err->getMessage());
            }
        }
    }
    public function selectProductoNombre($nombre){
        try{
            $nombre=$_POST['nombre'];
            $sql='SELECT * FROM `productos` WHERE `pro_nombre`=?';
            $con=$this->preparar_consulta($sql,[$nombre]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function updateProducto(){
        try{
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];
            $cantidad_disponible=$_POST['cantidad_disponible'];
            $sql='UPDATE`productos`SET `pro_nombre`=?,`pro_precio`=?,`pro_cantidad_disponible`=? WHERE `pro_nombre`='.$nombre;;
            $con=$this->preparar_consulta($sql,[$nombre,$precio,$cantidad_disponible]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function deleteProducto(){
        try{
            $nombre=$_POST['nombre'];
            $sql='DELETE FROM `producto` WHERE `pro_nombre`=?';
            $con=$this->preparar_consulta($sql,[$nombre]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
}
?>