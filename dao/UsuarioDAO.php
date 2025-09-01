<?php
require_once __DIR__ . "/../model/Usuario.php";

class UsuarioDAO{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function registrar(Usuario $usuario){
        $sql = "INSERT INTO usuarios (nombre, apellido, edad, email, password) VALUES (:nombre, :apellido, :edad, :email, :password)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":nombre", $usuario->getNombre());
        $stmt->bindValue(":apellido", $usuario->getApellido());
        $stmt->bindValue(":edad", $usuario->getEdad());
        $stmt->bindValue(":email", $usuario->getEmail());
        $stmt->bindValue(":password", $usuario->getPassword());

        return $stmt->execute();
    }


    public function login($email, $password){
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar password (se recomienda usar password_hash en el registro)
            if (password_verify($password, $row['password'])) {
                $usuario = new Usuario();
                $usuario->setId($row['id']);
                $usuario->setNombre($row['nombre']);
                $usuario->setEmail($row['email']);
                $usuario->setPassword($row['password']);
                return $usuario;
            }
        }
        return null;
    }
    
}
