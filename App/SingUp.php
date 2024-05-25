<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form action="process_signup.php" method="POST">
        <label for="idNumber">Número de Identificación:</label><br>
        <input type="text" id="idNumber" name="idNumber" required><br><br>

        <label for="email">Correo Electrónico:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="firstName">Nombre:</label><br>
        <input type="text" id="firstName" name="firstName" required><br><br>

        <label for="lastName">Apellido:</label><br>
        <input type="text" id="lastName" name="lastName" required><br><br>

        <label for="role">Rol:</label><br>
        <select id="role" name="role">
            <option value="Vendedor">Vendedor</option>
            <option value="Comprador">Comprador</option>
        </select><br><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>
