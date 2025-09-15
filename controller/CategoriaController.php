<?php
require_once __DIR__ . "/../config/Conexion.php"; #/../ ESTO SIGNIFICA SUBIR UN NIVEL DE CARPETA, de la carpeta en la que estoy la que es mi padre o esta encima mio
require_once __DIR__ . "/../model/Categoria.php";
require_once __DIR__ . "/../dao/CategoriaDAO.php";

class CategoriaController{

    private $dao;

    public function __construct(){
        $db = (new Database())->getConnection();
        $this->dao = new CategoriaDAO($db);
    }

    public function listarCategorias(){
        return $this->dao->listar();// Devuelve array de objetos Categoria
    }


    public function registrarCategoria($data){
        $categoria = new Categoria();
        if (!isset($data['nombre_categoria']) || empty(trim($data['nombre_categoria']))) {
            return "El nombre de la categoría es obligatorio.";
        }

        $categoria->setNombreCategoria(trim($data['nombre_categoria']));

        if ($this->dao->registrar($categoria)) {
            return "Categoría registrada correctamente.";
        } else {
            return "Error al registrar la categoría.";
        }
    }


}

?>