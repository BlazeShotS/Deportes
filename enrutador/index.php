<?php
require_once __DIR__ . "/../controller/UsuarioController.php";


$action = $_GET['action'] ?? "home"; // acción por defecto

$controller = new UsuarioController();

//Así el enrutador sabe si debe mostrar el formulario (GET) o procesar el login (POST).
switch ($action) {
    // --------- USUARIO ---------
    case "login":
        if ($_SERVER["REQUEST_METHOD"] === "POST") { //Comparo si la peticion que fue enviada de mi html es un POST, PUT , DELETE , GET en este caso es POST
            $mensaje =  $controller->login($_POST); //$_POST , YA CONTIENE LOS DATOS ENVIADOS EN UN ARRAYA POR EL FORMULARIO con el metodo POST             
            if ($mensaje) { // Si hubo error en login (el controlador devuelve un string)
                include "../view/Login.php";
            }
        } else {
            include "../view/Login.php"; //Cuando primero se abre la pestaña , se ejecuta este else, porque hace un get y muestra este html, despues en el if que esta arriva es el proceso de login
        }
        break;

    case "registrar":
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $mensaje = $controller->registrar($_POST); //Le paso un array  de los datos que vendra desde mi html
        } else {
            include "../view/RegistroUsuario.php";
        }
        break;

    default:
        echo "Página no encontrada (404)";
        break;
}