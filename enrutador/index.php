<?php
require_once __DIR__ . "/../controller/UsuarioController.php";
require_once __DIR__ . "/../controller/CategoriaController.php";


$action = $_GET['action'] ?? "home"; // acción por defecto

$controller = new UsuarioController();
$categoriaController = new CategoriaController();


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
            $mensaje = $controller->registrar($_POST); //$_POST es un array asociativo donde PHP automáticamente coloca todos los datos que se enviaron desde un formulario con method="POST
        } else {
            include "../view/RegistroUsuario.php";
        }
        break;
    case "categorias":
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Registrar nueva categoría
            $mensaje = $categoriaController->registrarCategoria($_POST);

            // Guardar mensaje en sesión para mostrarlo después del redirect
            $_SESSION['mensaje'] = $mensaje;

            // Redirigir a la misma página para evitar resubmission
            header("Location: ../enrutador/index.php?action=categorias");
            exit;
        }

        // Mostrar mensaje si existe
        $mensaje = $_SESSION['mensaje'] ?? "";
        unset($_SESSION['mensaje']); // Limpiar mensaje

        $categorias = $categoriaController->listarCategorias();

        include "../adminView/Categoria.php";
        break;
    default:
        echo "Página no encontrada (404)";
        break;
}
