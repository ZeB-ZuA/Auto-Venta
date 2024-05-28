<?php
require_once "../Service/CarService.php";

$carService = new CarService();
$cars = $carService->findAll();

if (isset(  $_GET['id'])){
    $userId = htmlspecialchars($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Carros</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            padding: 20px;
        }

        .card {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card-header {
            cursor: pointer;
        }

        .card-details {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div>
        <h2>Listado de Carros Disponibles</h2>
    </div>

    <div class="grid-container">
        <?php if ($cars): ?>
            <?php foreach ($cars as $car): ?>
                <div class="card">
                    <div class="card-header">
                        <strong>Marca:</strong> <?php echo $car->getBrand(); ?> <br>
                        <strong>Color:</strong> <?php echo $car->getColor(); ?> <br>
                        <strong>Año:</strong> <?php echo $car->getYear(); ?> <br>
                        <strong>Status:</strong> <?php echo $car->getStatus(); ?> <br>
                         <a href="../Process/process_add_favorites.php?id=<?php echo $userId; ?>&plate=<?php echo $car->getPlate(); ?>">Favoritos</a></br>
                    </div>
                    <div class="card-details">
                        <strong>Placa:</strong> <?php echo $car->getPlate(); ?> <br>
                        <strong>Modelo:</strong> <?php echo $car->getModel(); ?> <br>
                        <strong>Puertas:</strong> <?php echo $car->getDoors(); ?> <br>
                        <strong>Cilindraje:</strong> <?php echo $car->getCc(); ?> <br>
                        <strong>Transmisión:</strong> <?php echo $car->getTransmission(); ?> <br>
                        <strong>Combustible:</strong> <?php echo $car->getFuelType(); ?> <br>
                        <strong>Usado:</strong> <?php echo $car->getUsed(); ?> <br>
                        <strong>Kilómetros:</strong> <?php echo $car->getKilometers(); ?> <br>
                        <strong>Imagen:</strong> <img src="<?php echo $car->getImage(); ?>" alt="Imagen del Carro"
                            style="width:100px;height:auto;"><br>
                        <strong>Precio:</strong> <?php echo $car->getPrice(); ?> <br>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay carros disponibles en este momento.</p>
        <?php endif; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var headers = document.querySelectorAll('.card-header');
            headers.forEach(function (header) {
                header.addEventListener('click', function () {
                    var details = this.nextElementSibling;
                    details.style.display = details.style.display === 'none' ? 'block' : 'none';
                });
            });
        });
    </script>
</body>

</html>
