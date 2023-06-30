<?php 
// aquí manejaremos los productos y sus acciones necesarias
$model=dirname(__DIR__,1).'/models/';
require_once $model.'/Producto.php';

class ProductoController{

    public function verProductos(){
        $producto=new Producto;
        $productos=$producto->selectAll();

        //include('views/includes/tables/tabla_productos.php');
        return $productos;
    }
    public function crearProducto($nombre,$precio,$cantidad_disponible){
        // funcion del formulario de edición del producto
        if (isset($_POST['crearProducto'])) {
            // $nombre=$_POST['nombre'];
            // $precio=$_POST['precio'];
            // $cantidad_disponible=$_POST['cantidad_disponible'];
            $producto=new Producto;
            $producto->createProducto($nombre,$precio,$cantidad_disponible);
            echo '</h1> Creado con Exito </h1>';
        } else {
            echo '</h1> Algo salio mal </h1>';
        }
        //header("Location: formulario_edicion_producto.php");
        //exit;
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

        }
    }
    
    public function eliminarProducto($nombre){
        if(isset($_POST['eliminarProducto'])){
            $nombre=$_POST['nombre'];
            $producto = new Producto;
            $producto->deleteProducto($nombre);
            // Realiza las operaciones necesarias después de eliminar el producto
            echo '</h1> Se elimino el registro </h1>'.$nombre;
        } else {
            echo '</h1> Algo salio re mal </h1>';

        }
    }
}
?>