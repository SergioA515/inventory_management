<?php
require_once 'controllers/administradorcontroller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <p class="controlText">
            CONTROL DE INVENTARIOS CONTRA
        </p>
    </div>
    <div class="container_index">
        <form action="#" class="logIn" method="post">
            <?php
            $adm = new AdministradorController;
            ?>
            <p class="welcomeText">Bienvenido</p>
            <label for="usuarioInp" class="usuarioLbl">Usuario Administrador</label>
            <input name="usuario" type="text" id="usuarioInp" required>
            <label for="contraseniaInp" class="contraseniaLbl">Contraseña Administrador</label>
            <input name="contrasenia" type="password" id="contraseniaInp" required>
            <input name="ingresar" type="submit" value="Ingresar">
        </form>
    </div>
    <footer>
    <div class="footer">
        <p class="info">
            Este Sistema es Propiedad Privada de la Distribuidora Contra
            <br>
            01-05-2023
            <br>
            Contactenos - 000000000
        </p>
    </div>
    </footer>
</body>
</html>
