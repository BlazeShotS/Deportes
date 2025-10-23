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
        if (!isset($data['nombre_categoria']) || empty(trim($data['nombre_categoria']))) { //Ese nombre_categoria viene del html 
            return "El nombre de la categoría es obligatorio.";
        }

        $categoria->setNombreCategoria(trim($data['nombre_categoria']));

        if ($this->dao->registrar($categoria)) {//Llamando a mi metodo registrar del DAO
            return "Categoría registrada correctamente.";
        } else {
            return "Error al registrar la categoría.";
        }
    }


    public function editarCategoria($data){
        if (!isset($data['id']) || !is_numeric($data['id'])) {
            return "ID inválido.";
        }

        if (!isset($data['nombre_categoria']) || empty(trim($data['nombre_categoria']))) {
        return "El nombre de la categoría es obligatorio.";
        }   

        $categoria = new Categoria();
        $categoria->setId((int)$data['id']);
        $categoria->setNombreCategoria(trim($data['nombre_categoria']));

        if ($this->dao->editar($categoria)) {
            return "Categoría actualizada correctamente.";
        } else {
            return "Error al actualizar la categoría.";
        }
    }



    public function eliminarCategoria($id){
        if (!is_numeric($id)) {
            return "ID inválido.";
        }
        if ($this->dao->eliminar((int)$id)) {
            return "Categoría eliminada correctamente.";
        } else {
            return "Error al eliminar la categoría.";
        }
    }



}

?>