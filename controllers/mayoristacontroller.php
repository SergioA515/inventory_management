<?php
require_once '../models/Mayorista.php';

class MayoristaController{

    public function verMayoristas(){
        $mayorista =new Mayorista;
        $mayoristas=$mayorista->selectAll();

        include('views/includes/tables/tabla_productos.php');
        return $mayoristas;
    }
    
    public function alterarMayoristas(){
        // Redirige al formulario de edición del producto
        header("Location: formulario_edicion_producto.php");
        exit;
    }

    public function obtenerMayoristas($nombre){
        $producto = new Producto;
        $productoEncontrado = $producto->selectProductoNombre($nombre);

        // Realiza las operaciones necesarias con $productoEncontrado

        include('views/producto.php');
    }

    public function actualizarMayorista(){
        if(isset($_POST['nombre'])){
            $mayorista = new Mayorista;
            $mayorista->updateMayorista();

            // Realiza las operaciones necesarias después de actualizar el producto

            header("Location: lista_mayoristas.php");
            exit;
        }
    }
    
    public function eliminarMayorista(){
        if(isset($_POST['nombre'])){
            $Mayorista = new Mayorista;
            $Mayorista->deleteMayorista();

            // Realiza las operaciones necesarias después de eliminar el Mayorista

            header("Location: lista_Mayoristas.php");
            exit;
        }
    }

}
?>