<?php
require_once '../Connection.php';
require_once '../Entity/User.php';
require_once '../Service/UserService.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idNumber = $_POST['idNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $role = $_POST['role'];
    $credit = 0;
    $registrationDate = date('Y-m-d');

    $userService = new UserService();

    $user = new User($idNumber, $email, $password, $firstName, $lastName, $role, null, $credit, $registrationDate);

    $saved = $userService->save($user);

    if ($saved) {
        header("location: ../views/login.php");
    } else {
        echo "Error al registrar el usuario: " . $stmt->errorInfo()[2];
    }

}
?>
