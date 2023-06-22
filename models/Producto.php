    <?php 
include_once ('../config/Conexion.php');
class Producto {
        private $id;
        private $nombre;
        private $precio;
        private $cantidad_disponible;
        private $con=new Conexion;
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
                $this->con->preparar_consulta($sql,[$nombre,$precio,$cantidad_disponible]);
                $this->con->desconectar();
            }catch(Exception $err){
                echo($err->getMessage());
            }
        }
    }
    public function selectProductoNombre($nombre){
        try{
            $nombre=$_POST['nombre'];
            $sql='SELECT * FROM `productos` WHERE `pro_nombre`=?';
            $producto=$this->con->preparar_consulta($sql,[$nombre]);
            $this->con->desconectar();
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
            $sql='UPDATE`productos`SET `pro_nombre`=?,`pro_precio`=?,`pro_cantidad_disponible`=? WHERE `pro_nombre`='.$nombre;;
            $this->con->preparar_consulta($sql,[$nombre,$precio,$cantidad_disponible]);
            $this->con->desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function deleteProducto(){
        try{
            $nombre=$_POST['nombre'];
            $sql='DELETE FROM `productos` WHERE `pro_nombre`=?';
            $this->con->preparar_consulta($sql,[$nombre]);
            $this->con->desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function selectAll(){
        try {
            $sql='SELECT prod_nombre, prod_precio, prod_cantidad_disponible FROM `productos`';
            $results = $this->con->preparar_consulta($sql,[]);
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
            $this->con->desconectar();
            return $productos;
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
}
?>