<?php
require_once './Connection.php';

$conexionBD = new Connection(); // Crear una instancia de la clase Connection

// Datos del nuevo usuario
$cedula = 123456789;
$correoElectronico = "ejemplo@example.com";
$contrasena = "password";
$nombre = "Juan";
$apellido = "Pérez";
$credito = 1000; // Suponiendo que esto sea el crédito inicial
$fechaRegistro = date("Y-m-d"); // Fecha actual

// Intentar conectar
try {
    $conexion = $conexionBD->connect();

    // Preparar la sentencia SQL
    $statement = $conexion->prepare("INSERT INTO User (Cedula, Correo_Electronico, Contraseña, Nombre, Apellido, Credito, Fecha_Registro) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Ejecutar la sentencia SQL con los datos proporcionados
    $statement->execute([$cedula, $correoElectronico, $contrasena, $nombre, $apellido, $credito, $fechaRegistro]);

    echo "Usuario insertado correctamente.";
} catch (PDOException $error) {
    echo 'Error al insertar usuario: ' . $error->getMessage();
}
?>
