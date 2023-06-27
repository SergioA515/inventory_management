<?php

class headers{
    static public function encabezado($t){
        $header="<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='/public/css/style.css'>
            <title>vista $t</title>
        </head>
        <body>";
        echo $header;
    }

    static public function sideBar(){
        $sideBar="
            <div class='header-reduce'>
                <nav>
                <span id='open-close'><i class='bx bx-menu'></i></span>
                </nav>
            </div>
            <div class='container'>
                <div id='aside'>
                    <div class='container-text'>
                        <div>
                            <span>Home</span>
                        </div>
                    </div>
                    <div class='container-text'>
                        <div>
                            <span>Productos</span>
                        </div>
                    </div>
                    <div class='container-text'>
                        <div>
                            <span>Proveedores</span>
                        </div>
                    </div>
                    <div class='container-text'>
                        <div>
                            <span>Asociados</span>
                        </div>
                    </div>
                </div>";
        echo $sideBar;
    }
    
}