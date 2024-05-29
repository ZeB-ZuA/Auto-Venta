<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Vendedor</title>
    <link rel="stylesheet" href="../css/style-sellerview.css" /> 
</head>

<body>

    <?php
    if (isset($_GET['id'])) {
        $userId = htmlspecialchars($_GET['id']);
        echo "<div class=\"card\">";
        echo "<button onclick=\"window.location.href='./UserProfile.php?id=$userId'\">Mi perfil</button>";
        echo "<button onclick=\"window.location.href='./SellerCars.php?id=$userId'\">Mis Carros</button>";
        echo "<button onclick=\"window.location.href='./SellerFiles.php?id=$userId'\">Mis Ventas</button>";
        echo "</div>";
    } else {
        echo "<div class=\"card\">";
        echo "No se recibió ID de usuario.";
        echo "</div>";
    }
    ?>

</body>

</html>
