<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAvoritos</title>
</head>

<body>

    <?php
    if (isset($_GET['id'])) {
        $userId = htmlspecialchars($_GET['id']);
        echo'Favoritos de : '.$userId.'</br>';
       
    } else {
        echo "No se recibió ID de usuario.";
    }
    ?>

</body>

</html>