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
        $method = $_SERVER["REQUEST_METHOD"];
        $subAction = $_GET['sub'] ?? "listar";

        switch ($subAction) {
            case "crear":
                if ($method === "POST") {
                    $mensaje = $categoriaController->registrarCategoria($_POST);
                    $_SESSION['mensaje'] = $mensaje;
                    header("Location: ../enrutador/index.php?action=categorias&sub=listar");
                    exit;
                }
                //include "../adminView/CategoriaForm.php";
                break;

            case "editar":
                if ($method === "POST") {
                    $mensaje = $categoriaController->editarCategoria($_POST);
                    $_SESSION['mensaje'] = $mensaje;
                    header("Location: ../enrutador/index.php?action=categorias&sub=listar");
                    exit;
                } else {
                    // Mostrar el formulario con datos para editar
                    $id = $_GET['id'] ?? null;
                    $categoriaEditar = null;
                    if ($id) {
                        foreach ($categoriaController->listarCategorias() as $cat) {
                            if ($cat->getId() == $id) {
                                $categoriaEditar = $cat;
                                break;
                            }
                        }
                    }
                    $mensaje = $_SESSION['mensaje'] ?? "";
                    unset($_SESSION['mensaje']);
                    $categorias = $categoriaController->listarCategorias();
                    include "../adminView/Categoria.php";
                }
                break;

            case "eliminar":
                $id = $_GET['id'] ?? null;
                $mensaje = $categoriaController->eliminarCategoria($id);
                $_SESSION['mensaje'] = $mensaje;
                header("Location: ../enrutador/index.php?action=categorias&sub=listar");
                exit;

            default: // listar
                $mensaje = $_SESSION['mensaje'] ?? "";
                unset($_SESSION['mensaje']);
                $categorias = $categoriaController->listarCategorias();
                include "../adminView/Categoria.php"; //Este incluide sirve porque indica que la accion se hara en esta pestaña
        }
        break;
    default:
        echo "Página no encontrada (404)";
        break;
}
