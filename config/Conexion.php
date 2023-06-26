<?php
class Conexion{
    private $pdo;
    private $status=false;
 
    public function __construct() {
    }
    
    public function conectar($user='root', $password='', $host='localhost', $db='inventario_exam') {
        try {
            $DSN = "mysql:host=$host;dbname=$db;charset=utf8mb4";
            $this->pdo = new PDO($DSN,$user,$password);
            $this->status = true; 
        } catch(PDOException $err) {
            echo($err->getMessage());
            die();
        }
    }
    public function desconectar() {
        $this->pdo = null;
        $this->status = false;
    }
    public function preparar_consulta($sql_query, $stQuery=[]){
        $pstm=$this->pdo->prepare($sql_query);
        $pstm->execute($stQuery);
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
} 
?>