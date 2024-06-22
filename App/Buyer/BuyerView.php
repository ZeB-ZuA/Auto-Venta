<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Vendedor</title>
    <link rel="stylesheet" href="../css/style-buyerview.css" />
    
</head>
<body>

    <header>
        <h1>Auto-Venta</h1>
        <nav>
            <?php
            if (isset($_GET['id'])) {
                $userId = htmlspecialchars($_GET['id']);
                echo "<a href=\"./UserProfile.php?id=$userId\">Mi perfil</a>";
                echo "<a href=\"./BuyerFavorites.php?id=$userId\">Favoritos</a>";
                echo "<a href=\"./BuyerBoughtCars.php?id=$userId\">Mis Compras</a>";
        echo "<a href=\"./ReportsAndGraphs.php?id=$userId\">Graficos y Reportes</a></br>";
            } else {
                echo "No se recibió ID de usuario.";
            }
            ?>

    <main>
        <?php
            require_once "./BuyerCarList.php";
        ?>
    </main>

</body>
</html>
