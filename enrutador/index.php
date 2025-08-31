<?php
require_once __DIR__ . "/../controller/UsuarioController.php";

$action = $_GET['action'] ?? "";

if($action === "registrar" && $_SERVER["REQUEST_METHOD"] === "POST") {
    $controller = new UsuarioController();
    $mensaje = $controller->registrar($_POST);
    echo $mensaje;
} else {
    include "../views/RegistroUsuario.php";
}
