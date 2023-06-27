<?php 
class loginView{
    static public function LOGINHtml($texto) {
        $htmlContent = "
            <div class='header'>
                <p class='controlText'>
                    CONTROL DE INVENTARIOS CONTRA $texto
                </p>
            </div>
            <div class='container_index'>
                <form action='?controller=usuarioController&action=log_in' class='logIn' method='post'>
                    <p class='welcomeText'>Bienvenido</p>
                    <label for='usuarioInp' class='usuarioLbl'>Usuario Administrador</label>
                    <input name='usuario' type='text' id='usuarioInp' required>
                    <label for='contraseniaInp' class='contraseniaLbl'>Contraseña Administrador</label>
                    <input name='contrasenia' type='password' id='contraseniaInp' required>
                    <input name='ingresar' type='submit' value='Ingresar'>
                </form>
            </div>
        ";
        return $htmlContent;
    }
}
