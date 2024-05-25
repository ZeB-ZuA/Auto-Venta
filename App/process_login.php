<?php

require_once 'AuthService.php';
require_once './Service/UserService.php';

$userService = new UserService();
$authService = new AuthService($userService);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']); 
    $password = htmlspecialchars($_POST['password']);
    $rol = htmlspecialchars($_POST['rol']);

    $user = $authService->logIn($email, $password, $rol); 

    if ($user) {
        $userId = $user->getId(); // Asumiendo que tienes un método getId() en la clase User
        if ($rol == 'Vendor') {
            header("Location: VendorView.php?id=$userId");
            exit();
        } elseif ($rol == 'Buyer') {
            header("Location: BuyerView.php?id=$userId");
            exit();
        }
    } else {
        echo "Credenciales incorrectas. Por favor, intenta de nuevo.";
    }
}



?>