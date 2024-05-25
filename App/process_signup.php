<?php
require_once 'Connection.php';
require_once './Entity/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idNumber = $_POST['idNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $role = $_POST['role'];
    $credit = 0;
    $registrationDate = date('Y-m-d');

    $db = new Connection();
    $conn = $db->connect();

    $user = new User($idNumber, $email, $password, $firstName, $lastName, $role, null, $credit, $registrationDate);

    $query = "INSERT INTO User (ID_Number, Email, Password, First_Name, Last_Name, Credit, Registration_Date, Rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([
        $user->getIdNumber(),
        $user->getEmail(),
        $user->getPassword(),
        $user->getFirstName(),
        $user->getLastName(),
        $user->getCredit(),
        $user->getRegistrationDate(),
        $user->getRol()
    ]);

    if ($stmt->rowCount() > 0) {
        header("location: Login.php");
    } else {
        echo "Error al registrar el usuario: " . $stmt->errorInfo()[2];
    }

    $stmt = null;
    $conn = null;
}
?>
