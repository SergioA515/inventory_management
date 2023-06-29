<?php
$controller = dirname(__FILE__,4); 
require_once $controller.'/controllers/productocontroller.php';
//$productos = $prodController->verProductos();
//require __DIR__.'\controller\productocontroller.php';
$prodController=new ProductoController;
$productos=$prodController->verProductos();
//var_dump($productos);
?>
    <div class="content-info">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Propiedad</th>
                        <th>Valor</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) : ?>
                        <tr>
                            <td>Propiedad</td>
                            <td>Valor</td>
                            <td><?php echo $producto['nombre']; ?></td>
                            <td><?php echo $producto['precio']; ?></td>
                            <td><?php echo $producto['cantidad']; ?></td>
                            <td><a href="../productos/control_producto.php" class=""><span>Editar</span></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
