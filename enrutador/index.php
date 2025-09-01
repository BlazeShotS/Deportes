<?php
require_once __DIR__ . "/../controller/UsuarioController.php";

$action = $_GET['action'] ?? "";

if($action === "registrar" && $_SERVER["REQUEST_METHOD"] === "POST") {
    $controller = new UsuarioController();
    $mensaje = $controller->registrar($_POST);
    echo $mensaje;
} elseif ($action === "login" && $_SERVER["REQUEST_METHOD"] === "POST") {
    $mensaje = $controller->login($_POST);
    echo $mensaje;

} else {
    // Aquí decides qué vista cargar dependiendo de la acción
    if ($action === "login") {
        include "../view/Login.php";
    } else {
        include "../view/RegistroUsuario.php";
    }
}