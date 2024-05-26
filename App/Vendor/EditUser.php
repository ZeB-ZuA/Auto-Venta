<?php
require_once '../Service/UserService.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = htmlspecialchars($_POST['id']);
    $userService = new UserService();
    $user = $userService->findById($userId);

    if ($user) {
        if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
            $user->setFirstName(htmlspecialchars($_POST['firstName']));
            $user->setLastName(htmlspecialchars($_POST['lastName']));
        }
        if (isset($_POST['email'])) {
            $user->setEmail(htmlspecialchars($_POST['email']));
        }
        
        if (isset($_POST['rol'])) {
            $user->setRol(htmlspecialchars($_POST['rol']));
        }

        $userService->update($user); 
        header("Location: ./UserProfile.php?id=$userId");
        exit();
    } else {
        echo "Usuario no encontrado.";
    }
} else {
    echo "Solicitud no válida.";
}
?>
