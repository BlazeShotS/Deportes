<?php
class Database{
    
    //Variables
    private $host = "localhost";
    private $db_name = "deportes"; /*deportes*/       /*tendalyvip_deportes*/
    private $username = "root"; /*root*/             /*tendalyvip_abel*/
    private $password = "root"; /*root*/         
    public $conn;

    //Clase conexion
    public function getConnection() {
        $this->conn = null;
        try { //Acceso a la variable , mediante $this -> host
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}",$this->username, $this->password);
            $this->conn->exec("SET NAMES utf8mb4"); /*set names utf8*/
        } catch(PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
        return $this->conn;
    }

}

?>