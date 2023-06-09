<?php
class Conexion{
    private $pdo;
    private $status=false;
    public function __construct($user='root',$password='',$host='localhost',$db='inventario_exam')
    {
        try{
            $DSN = "mysql:host=$host;db=$db;charset=utf8mb4";
            $this->pdo = new PDO($DSN,$user,$password);
            $this->status = true; 
        }
        catch(PDOException $err){
            echo($err->getMessage());
            die();
        }
    }
    public function desconectar()
    {
        if(isset($this->pdo)){
            $this->pdo=null;
        }
    }
} 
?>