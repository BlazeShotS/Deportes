<?php
require_once __DIR__ . "/../model/Usuario.php";

class UsuarioDAO{

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registrar(Usuario $usuario) {
        $sql = "INSERT INTO usuarios (nombre, apellido, edad, email, password) VALUES (:nombre, :apellido, :edad, :email, :password)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":nombre", $usuario->getNombre());
        $stmt->bindValue(":apellido", $usuario->getApellido());
        $stmt->bindValue(":edad", $usuario->getEdad());
        $stmt->bindValue(":email", $usuario->getEmail());
        $stmt->bindValue(":password", $usuario->getPassword());

        return $stmt->execute();
    }


}

?>