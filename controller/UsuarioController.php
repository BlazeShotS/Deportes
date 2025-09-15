<?php
require_once __DIR__ . "/../config/Conexion.php"; #/../ ESTO SIGNIFICA SUBIR UN NIVEL DE CARPETA, de la carpeta en la que estoy la que es mi padre o esta encima mio
require_once __DIR__ . "/../model/Usuario.php";
require_once __DIR__ . "/../dao/UsuarioDAO.php";


class UsuarioController{
    
    //Con $ → variables, propiedades, parámetros (valores guardados en memoria).
    //Sin $ → clases, métodos, funciones, constantes (cosas que no son variables, pero puedes usarlas para crear o ejecutar algo).

    //header("Location") → cambia la URL y hace una nueva petición HTTP (navegador va a otra página).
    //include → carga el archivo en la misma petición, sin cambiar la URL.

    private $dao;//Siempre que tiene $ es una variable

    public function __construct(){
        $db = (new Database())->getConnection();//Metodo de mi Conexion
        $this->dao = new UsuarioDAO($db);
    }

    
    public function registrar($data) { # $data es el array que recibe
        $usuario = new Usuario();
        $usuario->setNombre($data['nombre']); //nombre , viene del name=nombre del html
        $usuario->setApellido($data['apellido']);
        $usuario->setEdad($data['edad']);
        $usuario->setEmail($data['email']);
        $usuario->setPassword($data['password']);

        if($this->dao->registrar($usuario)) {
            header("Location: ../view/Login.php");
            exit;
        } else {
            return "Error al registrar el usuario.";
        }
    }


    
    public function login($data) {
        
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        if (!$email || !$password) {
           return "Faltan credenciales";
        }

        $usuario = $this->dao->login($email, $password);

        if ($usuario) {
            session_start();
            $_SESSION['usuario_id'] = $usuario->getId(); //Se guarda datos del usuario como el id , en usuario_id ,dentro de $_SESSION
            $_SESSION['usuario_nombre'] = $usuario->getNombre();

            header("Location: ../index.php");
            exit;
        } else {
            return "Usuario o contraseña incorrectos.";
        }
    }


}
