
<?php
if (isset($_GET['id'])) {
    $userId = htmlspecialchars($_GET['id']);
} else {
    echo "No se recibió ID de usuario.";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Graficos y Reportes</title>
</head>

<body>
    <h1>Graficos y Reportes</h1>
    <a href="./BuyerBuyFile.php?id=<?php echo "$userId"?>">Mis compras</a><br>
    <a href="./BuyerUsedGraph.php?id=<?php echo "$userId"?>">Mis carros usados</a><br>
    <hr>
    <h2>REPORTES GENERALES</h2>
    <a href="./CarsStatusGraph.php">Status de Carrros</a><br>
    <a href="./UserRolesGraph.php">Grafico Por roles</a><br>
    <a href="./UserinFormationReport.php">Reporte de usuarios general</a><br>
    <a href="./CarListReport.php">Reporte de carros general</a><br>
    <a href="./RegistrationGraph.php">Grafico Año de resgistro</a><br>

</body>

</html>