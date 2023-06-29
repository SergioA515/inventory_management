<?php
//$controller = dirname(__FILE__,3).'/controllers/'; 
//require_once $controller.'productocontroller.php';
//$productos = $prodController->verProductos();
//require __DIR__.'\controller\productocontroller.php';
//$prodController=new ProductoController;
//$prodController->verProductos();
var_dump(__DIR__);
$productos=[];
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
