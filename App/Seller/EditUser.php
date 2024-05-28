
<?php


// Dentro de la sección donde procesas el formulario (en EditUser.php)

// Función para limpiar los datos del formulario
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = clean_input($_POST['id']);
    $userService = new UserService();
    $user = $userService->findById($userId);

    if ($user) {
        if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
            $firstName = clean_input($_POST['firstName']);
            $lastName = clean_input($_POST['lastName']);
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
        }
        if (isset($_POST['email'])) {
            $email = clean_input($_POST['email']);
            $user->setEmail($email);
        }
        
        if (isset($_POST['rol'])) {
            $rol = clean_input($_POST['rol']);
            $user->setRol($rol);
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
