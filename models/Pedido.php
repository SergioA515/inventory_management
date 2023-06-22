<?php 
include_once ('../config/Conexion.php');
class Pedido extends Conexion{
    private $id;
    private $alias_pedido;
    private $fecha;
    private $id_s=[];

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
    public function get_fk_id_s($id_s=[],$id){
        $prov= new Proveedor;
        $id_prv = $prov->__get($id);
        
        $prod= new Producto;
        $id_prd = $prod->__get($id);

        $may= new Mayorista;
        $id_may= $may->__get($id);
        $id_s(
            $id_may,
            $id_prd,
            $id_prv
        );
        // if (isset(Administrador->__toString())){

        // }
        $sql='SELECT productos.prod_id,proveedores.prov_id,mayoristas.may_id 
        FROM pedidos JOIN productos ON pedidos.prod_id = productos.prod_id 
        JOIN proveedores ON pedidos.prov_id = proveedores.prov_id 
        JOIN mayoristas ON pedidos.may_id=mayoristas.may_id';
        return $id_s[$id];
    } 
    public function createPedido(){
        if(isset($_POST['pedido'])){
            try{
                $nombre=$_POST['alias_pedido'];
                $fecha=$_POST['fecha_pedido'];
                $sql='INSERT INTO `Proveedores`(prov_nombre, prov_direccion)VALUES(?,?)';
                $con=$this->preparar_consulta($sql,[$nombre,$fecha]);
                parent::desconectar();
            }catch(Exception $err){
                echo($err->getMessage());
            }
        }
    }
    public function selectPedidoNombre($nombre){
        try{
            $nombre=$_POST['nombre'];
            $sql='SELECT * FROM `pedidos` WHERE `pro_nombre`=?';
            $con=$this->preparar_consulta($sql,[$nombre]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function updatePedido(){
        try{
            $nombre=$_POST['nombre'];
            $direccion=$_POST['direccion'];
            $sql='UPDATE`pedidos`SET `may_nombre`=?,`may_direccion`=? WHERE `may_nombre`='.$nombre;
            $con=$this->preparar_consulta($sql,[$nombre,$direccion]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
    public function deletePedido(){
        try{
            $nombre=$_POST['nombre'];
            $sql='DELETE FROM `pedido` WHERE `may_nombre`=?';
            $con=$this->preparar_consulta($sql,[$nombre]);
            parent::desconectar();
        }catch(Exception $err){
            echo($err->getMessage());
        }
    }
}
?>