<?php

// conexión BD con la extensión PDO 
class Connection {

    private $host = "localhost:3306";
    private $bd = "AutoVentaDB";
    private $usuario = "root";
    private $clave = "1936";

    function connect() {
        try {
            $connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->bd . ";charset=utf8", $this->usuario, $this->clave);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $error) {
            echo 'Error conexion: ' . $error->getMessage();
            exit;
        }
    }
}

?>
