<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Vendedor</title>
</head>

<body>

    <?php
    if (isset($_GET['id'])) {
        $userId = htmlspecialchars($_GET['id']);
        echo "<a href=\"./UserProfile.php?id=$userId\">Mi perfil</a></br>";
        echo "<a href=\"./SellerCars.php?id=$userId\">Mis Carros</a>";
    } else {
        echo "No se recibió ID de usuario.";
    }
    ?>

</body>

</html>