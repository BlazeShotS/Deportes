<?php
require_once __DIR__. "/../model/Categoria.php";

class CategoriaDAO{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function registrar(Categoria $categoria){
        $sql = "INSERT INTO categoria (nombre_categoria) VALUES (:nombre_categoria)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":nombre_categoria", $categoria->getNombreCategoria());
        return $stmt->execute();

    }


}

?>