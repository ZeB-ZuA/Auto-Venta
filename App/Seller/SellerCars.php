<?php
require_once "../Service/CarService.php";

if (isset($_GET['id'])) {
    $sellerId = intval(htmlspecialchars($_GET['id']));
    $carService = new CarService();
    $cars = $carService->findBySellerId($sellerId);
} else {
    $cars = [];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car List</title>
    <link rel="stylesheet" href="../css/style-sellercars.css" /> 
</head>

<body>
    <div class="header">
        <h2>Mis Carros</h2>
        <a href="./SellerAddCar.php?id=<?php echo $sellerId; ?>" class="button">Agregar Carros</a>
    </div>
    <div class="card-container">
        <div class="grid-container">
            <?php if ($cars): ?>
                <?php foreach ($cars as $car): ?>
                    <div class="card">
                        <div class="card-header" onclick="toggleDetails(this)">
                            <strong>Marca:</strong> <?php echo $car->getBrand(); ?> <br>
                            <strong>Color:</strong> <?php echo $car->getColor(); ?> <br>
                            <strong>Año:</strong> <?php echo $car->getYear(); ?> <br>
                            <strong>Status:</strong> <?php echo $car->getStatus(); ?> <br>
                        </div>
                        <div class="card-details">
                            <strong>Placa:</strong> <?php echo $car->getPlate(); ?> <br>
                            <strong>Modelo:</strong> <?php echo $car->getModel(); ?> <br>
                            <strong>Puertas:</strong> <?php echo $car->getDoors(); ?> <br>
                            <strong>Cilindraje:</strong> <?php echo $car->getCc(); ?> <br>
                            <strong>Transmisión:</strong> <?php echo $car->getTransmission(); ?> <br>
                            <strong>Combustible:</strong> <?php echo $car->getFuelType(); ?> <br>
                            <strong>Usado:</strong> <?php echo $car->getUsed() ? 'Sí' : 'No'; ?> <br>
                            <strong>Kilómetros:</strong> <?php echo $car->getKilometers(); ?> <br>
                            <strong>Imagen:</strong> <img src="<?php echo $car->getImage(); ?>" alt="Car Image"><br>
                            <strong>Precio:</strong> <?php echo $car->getPrice(); ?> <br>
                            <a href="./SellerEditCar.php?plate=<?php echo $car->getPlate(); ?>&id=<?php echo $sellerId; ?>">Editar</a>
                            <form method="POST">
                                <input type="hidden" name="plate" value="<?php echo $car->getPlate(); ?>">
                                <button type="submit" name="delete">Eliminar</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No se encontraron carros para este vendedor.</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function toggleDetails(header) {
            var details = header.nextElementSibling;

            var allDetails = document.querySelectorAll('.card-details');
            allDetails.forEach(function (detail) {
                if (detail !== details) {
                    detail.style.display = 'none';
                    detail.parentElement.style.height = '';
                }
            });

            if (details.style.display === 'none' || details.style.display === '') {
                details.style.display = 'block';
                header.parentElement.style.height = 'auto';
            } else {
                details.style.display = 'none';
                header.parentElement.style.height = '';
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            var details = document.querySelectorAll('.card-details');
            details.forEach(function (detail) {
                detail.style.display = 'none';
            });
        });
    </script>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    if (isset($_POST['plate'])) {
        $plate = $_POST['plate'];
        require_once "../Service/CarService.php";
        $carService = new CarService();
        if ($carService->delete($plate)) {
            // Car deleted successfully
        } else {
            echo "Error al eliminar el carro.";
        }
    } else {
        echo "Placa del carro no especificada.";
    }
}
?>