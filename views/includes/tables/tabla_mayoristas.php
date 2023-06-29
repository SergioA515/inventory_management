<?php 
require_once('controllers/productocontroller.php');
//$mayController=new MayoristaController;
//$mayoristas = $mayController->verMayoristas();
function generarTablaMayorista($mayoristas){
    ?>
    <div class="container">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Propiedad</th>
                        <th>Valor</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mayoristas as $mayorista) : ?>
                        <tr>
                            <td>Propiedad</td>
                            <td>Valor</td>
                            <td><?php echo $mayorista['nombre']; ?></td>
                            <td><?php echo $mayorista['direccion']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
} 
