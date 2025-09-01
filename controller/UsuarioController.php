<?php
require_once __DIR__ . "/../config/Conexion.php"; #/../ ESTO SIGNIFICA SUBIR UN NIVEL DE CARPETA, de la carpeta en la que estoy la que es mi padre o esta encima mio
require_once __DIR__ . "/../model/Usuario.php";
require_once __DIR__ . "/../dao/UsuarioDAO.php";


class UsuarioController{

    private $dao;

    public function __construct(){
        $db = (new Database())->getConnection();//Metodo de mi Conexion
        $this->dao = new UsuarioDAO($db);
    }

    
    public function registrar($data) {
        $usuario = new Usuario();
        $usuario->setNombre($data['nombre']); //nombre , viene del name=nombre del html
        $usuario->setApellido($data['apellido']);
        $usuario->setEdad($data['edad']);
        $usuario->setEmail($data['email']);
        $usuario->setPassword($data['password']);

        if($this->dao->registrar($usuario)) {
            return "Usuario registrado correctamente.";
        } else {
            return "Error al registrar el usuario.";
        }
    }


    
    public function login($email, $password) {
        $usuario = $this->dao->login($email, $password);

        if ($usuario) {
            session_start();
            $_SESSION['usuario_id'] = $usuario->getId();
            $_SESSION['usuario_nombre'] = $usuario->getNombre();
            return true;
        } else {
            return false;
        }
    }


}
