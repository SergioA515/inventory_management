<?php 
$controller = dirname(__FILE__,3); 
require_once $controller.'/controllers/productocontroller.php';
$prodController=new ProductoController;
    
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prodController->crearProducto($_POST['nombre'],$_POST['precio'],$_POST['cantidad_disponible']);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminarProducto'])){
    $prodController->eliminarProducto($_POST['nombre']);
}
?>
<div class="col-6">
    <div class="container-fluid">
        <form class='register_obj' action="/views/productos/crear_producto.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del Producto</label>
                <input name="nombre" type="text" class="form-control" id=""
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Precio</label>
                <input name="precio" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Cantidad en Stock</label>
                <input name="cantidad_disponible" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="">
                <button name="crearProducto" type="submit" class="btn btn-primary  btn-sm">Crear producto</button>
                <button name="eliminarProducto" type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Eliminar</button>
            </div>
        </form>
    </div>
</div>