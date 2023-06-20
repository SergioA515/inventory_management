<?php
require_once 'models/Mayorista.php';

class MayoristaController{

    public function verMayoristas(){
        $mayorista =new Mayorista;
        $mayoristas=$mayorista->selectAll();

        include('');
        return $mayoristas;
    }


}
?>