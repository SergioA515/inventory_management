<?php 
//require_once('controllers/productocontroller.php');
//$mayController=new MayoristaController;
//$mayoristas = $mayController->verMayoristas();var_dump(__DIR__);
$proveedores=[];
?>
    <div class="content-info">
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
                    <?php foreach ($proveedores as $proveedor) : ?>
                        <tr>
                            <td>Propiedad</td>
                            <td>Valor</td>
                            <td><?php echo $proveedor['nombre']; ?></td>
                            <td><?php echo $proveedor['direccion']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
