<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carro</title>
</head>

<body>
    <h2>Editar Carro</h2>
    <?php
    require_once "../Service/CarService.php";
    if (isset($_GET['plate'])) {
        $carPlate = htmlspecialchars($_GET['plate']);
        $carService = new CarService();
        $car = $carService->findByPlate($carPlate);

        if ($car) {
            echo '<form method="POST" action="../Process/process_edit_car.php" enctype="multipart/form-data">';
            echo '<input type="hidden" name="plate" value="' . $car->getPlate() . '">';
            echo 'Placa <strong>' . $car->getPlate() . '</strong><br>';
            echo 'Marca: <input type="text" name="brand" value="' . $car->getBrand() . '"><br>';
            echo 'Modelo: <input type="text" name="model" value="' . $car->getModel() . '"><br>';
            echo 'Año: <input type="text" name="year" value="' . $car->getYear() . '"><br>';
            echo 'Color: <input type="text" name="color" value="' . $car->getColor() . '"><br>';
            echo 'Doors: <input type="text" name="doors" value="' . $car->getDoors() . '"><br>';
            echo 'Cilindraje: <input type="text" name="cc" value="' . $car->getCc() . '"><br>';
            echo 'Transmisión: <select name="transmission">';
            echo '<option value="Manual" ' . ($car->getTransmission() == "Manual" ? 'selected' : '') . '>Manual</option>';
            echo '<option value="Automática" ' . ($car->getTransmission() == "Automática" ? 'selected' : '') . '>Automática</option>';
            echo '<option value="Semi-Automática" ' . ($car->getTransmission() == "Semi-Automática" ? 'selected' : '') . '>Semi-Automática</option>';
            echo '</select><br>';
            echo 'Combustible: <select name="fuelType">';
            echo '<option value="Gasolina" ' . ($car->getFuelType() == "Gasolina" ? 'selected' : '') . '>Gasolina</option>';
            echo '<option value="Diesel" ' . ($car->getFuelType() == "Diesel" ? 'selected' : '') . '>Diesel</option>';
            echo '<option value="Híbrido" ' . ($car->getFuelType() == "Híbrido" ? 'selected' : '') . '>Híbrido</option>';
            echo '<option value="Eléctrico" ' . ($car->getFuelType() == "Eléctrico" ? 'selected' : '') . '>Eléctrico</option>';
            echo '</select><br>';
            echo 'Usado: <input type="text" name="used" value="' . $car->getUsed() . '"><br>';
            echo 'Kiloemtros: <input type="text" name="km" value="' . $car->getKilometers() . '"><br>';
            echo '<input type="hidden" name="image" value="' . $car->getImage() . '">';
            echo 'Imagen: <img src="' . $car->getImage() . '" alt="Imagen actual" style="max-width: 200px;"><br>';
            echo 'Nueva imagen: <input type="file" name="newImage" accept="image/*"><br>';
            echo 'Precio: <input type="text" name="price" value="' . $car->getPrice() . '"><br>';
            echo 'Estado: <select name="status">';
            echo '<option value="Disponible" ' . ($car->getStatus() == "Disponible" ? 'selected' : '') . '>Disponible</option>';
            echo '<option value="Vendido" ' . ($car->getStatus() == "Vendido" ? 'selected' : '') . '>Vendido</option>';
            echo '</select><br>';
            echo '<input type="submit" value="Guardar">';
            echo '</form>';


        } else {
            echo "Carro no encontrado.";
        }
    } else {
        echo "Placa del carro no especificada.";
    }
    ?>
</body>

</html>