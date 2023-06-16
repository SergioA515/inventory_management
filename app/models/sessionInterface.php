<?php
namespace app\Interfaces;
interface sessionInterface{
    public function verificacion($usuario,$contrasenia);
    public function log_in();

    public function log_out();
}