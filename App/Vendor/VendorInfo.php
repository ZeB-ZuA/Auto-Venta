<?php
require_once '../Service/UserService.php';

if (isset($_GET['id'])) {
    $userId = htmlspecialchars($_GET['id']);

    $userService = new UserService();
    $user = $userService->findById($userId);

    if ($user) {
        echo '<form id="editForm" method="post" action="./EditUser.php">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($userId) . '">';
        echo "<table>";
        echo "<tr><th>ID</th><td>" . htmlspecialchars($user->getIdNumber()) . "</td><td></td></tr>";
        echo "<tr><th>Nombre</th><td><span id='firstName'>" . htmlspecialchars($user->getFirstName()) . " " . htmlspecialchars($user->getLastName()) . "</span></td><td><button type='button' onclick='editField(\"firstName\", \"lastName\")'>Editar</button></td></tr>";
        echo "<tr><th>Email</th><td><span id='email'>" . htmlspecialchars($user->getEmail()) . "</span></td><td><button type='button' onclick='editField(\"email\")'>Editar</button></td></tr>";
        echo "<tr><th>Rol</th><td><span id='rol'>" . htmlspecialchars($user->getRol()) . "</span></td><td><button type='button' onclick='editField(\"rol\")'>Editar</button></td></tr>";
        echo "</table>";
        echo '<button type="submit">Guardar cambios</button>';
        echo '</form>';
    } else {
        echo "Usuario no encontrado.";
    }
} else {
    echo "No se recibió ID de usuario.";
}
?>

<script>
function editField(...fields) {
    fields.forEach(field => {
        let span = document.getElementById(field);
        let currentValue = span.innerText;
        span.innerHTML = `<input type='text' name='${field}' value='${currentValue}'>`;
    });
}
</script>
