<?php

class Categoria{

    private $id;
    private $nombre_categoria;

    // Constructor
    public function __construct() {}

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombreCategoria() {
        return $this->nombre_categoria;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombreCategoria($nombre_categoria) {
        $this->nombre_categoria = $nombre_categoria;
    }

}

?>