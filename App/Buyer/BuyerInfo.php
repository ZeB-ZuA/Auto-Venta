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
        echo "<tr><th>ID</th><td>" . htmlspecialchars($user->getIdNumber()) . "</td><td><input type='hidden' name='idNumber' value='" . htmlspecialchars($user->getIdNumber()) . "'></td></tr>";
        echo "<tr><th>Nombre</th><td><span id='firstName'>" . htmlspecialchars($user->getFirstName()) . "</span><input type='hidden' name='firstName' value='" . htmlspecialchars($user->getFirstName()) . "'></td><td><button type='button' onclick='editField(\"firstName\")'>Editar</button></td></tr>";
        echo "<tr><th>Apellido</th><td><span id='lastName'>" . htmlspecialchars($user->getLastName()) . "</span><input type='hidden' name='lastName' value='" . htmlspecialchars($user->getLastName()) . "'></td><td><button type='button' onclick='editField(\"lastName\")'>Editar</button></td></tr>";
        echo "<tr><th>Email</th><td><span id='email'>" . htmlspecialchars($user->getEmail()) . "</span><input type='hidden' name='email' value='" . htmlspecialchars($user->getEmail()) . "'></td><td><button type='button' onclick='editField(\"email\")'>Editar</button></td></tr>";
        echo "<tr><th>Rol</th><td><span id='rol'>" . htmlspecialchars($user->getRol()) . "</span><input type='hidden' name='rol' value='" . htmlspecialchars($user->getRol()) . "'></td>";
        echo "<tr><th>Credito</th><td><span id='credit'>" . htmlspecialchars($user->getCredit()) . "</span><input type='hidden' name='credit' value='" . htmlspecialchars($user->getCredit()) . "'></td><td><button type='button' onclick='editField(\"credit\")'>Editar</button></td></tr>";
        echo "<tr><th>Contraseña</th><td><span id='password'>" . htmlspecialchars($user->getPassword()) . "</span><input type='hidden' name='password' value='" . htmlspecialchars($user->getPassword()) . "'></td><td><button type='button' onclick='editField(\"password\")'>Editar</button></td></tr>";
        echo "<tr><th>Fecha de Registro</th><td><span id='registrationDate'>" . htmlspecialchars($user->getRegistrationDate()) . "</span><input type='hidden' name='registrationDate' value='" . htmlspecialchars($user->getRegistrationDate()) . "' readonly></td><td></td></tr>";
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
function editField(field) {
    let span = document.getElementById(field);
    let hiddenInput = span.nextElementSibling;
    let currentValue = span.innerText;
    let inputField = document.createElement('input');
    inputField.type = 'text';
    inputField.name = field;
    inputField.value = currentValue;
    span.parentNode.replaceChild(inputField, span);
    hiddenInput.remove();
}
</script>
