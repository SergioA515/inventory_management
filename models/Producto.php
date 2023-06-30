<?php 
$config=dirname(__DIR__,1).'/config/';
include_once $config.'Conexion.php';
class Producto {
        private $id;
        private $nombre;
        private $precio;
        private $cantidad_disponible;
    
    public function __construct(){
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
    public function createProducto($nombre,$precio,$cantidad_disponible){
        try{
            $db=new Conexion;
            $db->conectar();
            $sql='INSERT INTO `productos`(prod_nombre, prod_precio, prod_cantidad_disponible)VALUES(?,?,?)';
            $db->preparar_consulta($sql,[$nombre,$precio,$cantidad_disponible]);
            $db->desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function selectProductoNombre($nombre){
        try{
            $nombre=$_POST['nombre'];
            $db=new Conexion;
            $db->conectar();
            $sql='SELECT * FROM `productos` WHERE `pro_nombre`=?';
            $producto=$db->preparar_consulta($sql,[$nombre]);
            $db->desconectar();
            return $producto;
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function updateProducto(){
        try{
            $nombre=$_POST['nombre'];
            $precio=$_POST['precio'];
            $cantidad_disponible=$_POST['cantidad_disponible'];
            $db=new Conexion;
            $db->conectar();
            $sql='UPDATE`productos`SET `pro_nombre`=?,`pro_precio`=?,`pro_cantidad_disponible`=? WHERE `pro_nombre`='.$nombre;;
            $db->preparar_consulta($sql,[$nombre,$precio,$cantidad_disponible]);
            $db->desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function deleteProducto($nombre){
        try{
            $db=new Conexion;
            $db->conectar();
            $nombre=$_POST['nombre'];
            $sql='DELETE FROM `productos` WHERE `prod_nombre`=?';
            $db->preparar_consulta($sql,[$nombre]);
            $db->desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function selectAll(){
        try {
            $db=new Conexion;
            $db->conectar();
            $sql='SELECT prod_nombre, prod_precio, prod_cantidad_disponible FROM `productos`';
            $results = $db->preparar_consulta($sql,[]);
            $productos=[];
            foreach($results as $producto){
                $nombre=$producto['prod_nombre'];
                $precio=$producto['prod_precio'];
                $cantidad_disponible=$producto['prod_cantidad_disponible'];
                
                $productos[]= [
                'nombre'=> $nombre,
                'precio'=>$precio,
                'cantidad'=>$cantidad_disponible
                ];
            }
            $db->desconectar();
            return $productos;
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
}
?>