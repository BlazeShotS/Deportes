<?php

class Usuario{

    //Variables
    private $id;
    private $nombre;
    private $apellido;
    private $edad;
    private $email;
    private $password;

    //Acceso a las variables
    public function __construct($nombre = "", $apellido = "", $edad = 0, $email = "", $password = ""){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->email = $email;
        $this->password = $password;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getApellido() { return $this->apellido; }
    public function getEdad() { return $this->edad; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setApellido($apellido) { $this->apellido = $apellido; }
    public function setEdad($edad) { $this->edad = $edad; }
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { //Esto hace , que nunca lo guarde en texto plano , sino encriptado
        $this->password = password_hash($password, PASSWORD_BCRYPT); 
    }


}
