<?php

require_once 'AuthService.php';
require_once './Service/UserService.php';

$userService = new UserService();
$authService = new AuthService($userService);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; 
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    $user = $authService->logIn($email, $password, $rol); 

    if ($user) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "Credenciales incorrectas. Por favor, intenta de nuevo.";
    }
}

?>