<?php

// conexión BD con la extensión PDO 
class Connection {

    private $host = "localhost";
    private $bd = "autoventadb";
    private $usuario = "root";
    private $clave = "1234";

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