<?php 
require_once('controllers/productocontroller.php');
$prodController=new ProductoController;
//$productos = $prodController->verProductos();
function generarTablaProducto($productos){
    ?>
    <div class="container">
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
    <?php
}
?>
