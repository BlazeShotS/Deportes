<?php

class CategoriaController{

    private $dao;

    public function __construct(){
        $db = (new Database())->getConnection();
        $this->dao = new CategoriaDAO($db);
    }

    public function registrarCategoria($data){
        
    }


}

?>