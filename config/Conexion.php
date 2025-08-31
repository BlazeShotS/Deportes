<?php
class Database{

    //Variables
    private $host = "localhost";
    private $db_name = "deportes";
    private $username = "root";
    private $password = "root";
    public $conn;

    
    public function getConnection() {
        $this->conn = null;
        try { //Acceso a la variable , mediante $this -> host
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}",$this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
        return $this->conn;
    }

}

?>