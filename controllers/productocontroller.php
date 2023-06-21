<?php 
// aquí manejaremos los productos y sus acciones necesarias
require_once('models/Producto.php');

class ProductoController{

    public function verProductos(){
        $producto=new Producto;
        $productos=$producto->selectAll();

        include('');
        return $productos;
    }

    public function alterar_registro(){

    }
    public function edicionProductos(){
        
    }
    public function eliminarProductos(){

    }
}
?>