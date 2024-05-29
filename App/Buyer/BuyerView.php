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
        echo'ID de usuario: '.$userId.'</br>';
        echo "<a href=\"./UserProfile.php?id=$userId\">Mi perfil</a></br>";
        echo "<a href=\"./BuyerFavorites.php?id=$userId\">Favoritos</a></br>";
        echo "<a href=\"./BuyerBoughtCars.php?id=$userId\">Mis Compras</a></br>";

       
        require_once "./BuyerCarList.php";
    } else {
        echo "No se recibió ID de usuario.";
    }
    ?>

</body>

</html>
