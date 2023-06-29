<?php 
// aquí manejaremos los productos y sus acciones necesarias
$model=dirname(__DIR__,1).'/models/';
require_once $model.'/Producto.php';

class ProductoController{

    public function verProductos(){
        $producto=new Producto;
        $productos=$producto->selectAll();

        include('views/includes/tables/tabla_productos.php');
        return $productos;
    }
    public function alterarProducto(){
        // Redirige al formulario de edición del producto
        header("Location: formulario_edicion_producto.php");
        exit;
    }

    public function obtenerProducto($nombre){
        $producto = new Producto;
        $productoEncontrado = $producto->selectProductoNombre($nombre);

        // Realiza las operaciones necesarias con $productoEncontrado

        include('views/producto.php');
    }

    public function actualizarProducto(){
        if(isset($_POST['nombre'])){
            $producto = new Producto;
            $producto->updateProducto();

            // Realiza las operaciones necesarias después de actualizar el producto

            header("Location: lista_productos.php");
            exit;
        }
    }
    
    public function eliminarProducto(){
        if(isset($_POST['nombre'])){
            $producto = new Producto;
            $producto->deleteProducto();

            // Realiza las operaciones necesarias después de eliminar el producto

            header("Location: lista_productos.php");
            exit;
        }
    }
}
?>