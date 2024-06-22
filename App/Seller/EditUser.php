<?php
require_once __DIR__ . '/../Service/UserService.php';
require_once __DIR__ . '/../Entity/User.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  

    $id = htmlspecialchars($_POST['id']);
    $idNumber = htmlspecialchars($_POST['idNumber']); 
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $rol = htmlspecialchars($_POST['rol']);
    $credit = htmlspecialchars($_POST['credit']);
    $password = htmlspecialchars($_POST['password']);
    $registrationDate = htmlspecialchars($_POST['registrationDate']);

    $user = new User($idNumber, $email, $password, $firstName, $lastName, $rol, $id, $credit, $registrationDate);

    $userService = new UserService();
    $result = $userService->update($user);

    if ($result) {
        header("Location: ./UserProfile.php?id=$id");
        exit();


    } else {
        echo "Error al actualizar el usuario.";
    }

} else {
    echo "Método de solicitud no permitido.";
}
?>
