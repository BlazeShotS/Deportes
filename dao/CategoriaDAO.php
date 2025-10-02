<?php
require_once __DIR__ . "/../model/Categoria.php";

class CategoriaDAO{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function listar(): array {        
        $sql = "SELECT * FROM categoria";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // PDO::FETCH_CLASS llenará solo propiedades públicas, así que usamos setters
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resultado = [];
        foreach($categorias as $row){
            $cat = new Categoria();
            $cat->setId($row['id']);
            $cat->setNombreCategoria($row['nombre_categoria']);
            $resultado[] = $cat;
        }
        return $resultado;
    }
    

    public function registrar(Categoria $categoria){        
        $sql = "INSERT INTO categoria (nombre_categoria) VALUES (:nombre_categoria)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":nombre_categoria", $categoria->getNombreCategoria());
        return $stmt->execute();
    }

    
    public function editar(Categoria $categoria){
        $sql = "UPDATE categoria SET nombre_categoria = :nombre_categoria WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":nombre_categoria", $categoria->getNombreCategoria());
        $stmt->bindValue(":id", $categoria->getId(), PDO::PARAM_INT);

        return $stmt->execute();
    }
    

    public function eliminar($id){
        $sql = "DELETE FROM categoria WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

}
