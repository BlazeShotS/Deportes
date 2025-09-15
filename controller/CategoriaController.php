<?php

class CategoriaController{

    private $dao;

    public function __construct(){
        $db = (new Database())->getConnection();
        $this->dao = new CategoriaDAO($db);
    }

    public function listarCategorias(){
        return $this->dao->listar();
    }

    public function registrarCategoria($data){
        $categoria = new Categoria();
        $categoria->setNombreCategoria($data['nombreCategoria']);
       

    }


}

?>