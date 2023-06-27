<?php

/** controlador para renderizar vistas generales
     -- version:  '1.00'; */
    class viewController {

        function encabezado($t){
            $header= headers::encabezado($t);
            echo $header;
        }

        function sideBar(){
            headers::sideBar();
        }

        function login($texto){
            $header = loginView::LOGINHtml($texto);
            echo $header;
        }

        function footer(){
            $f = footers::footerGeneral();
            echo $f;
        }
    }