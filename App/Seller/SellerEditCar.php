<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carro</title>
    <link rel="stylesheet" href="../css/style-sellereditcar.css" />
</head>
<body>
    <?php
    require_once "../Service/CarService.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    if (isset($_GET['plate'])) {
        $carPlate = htmlspecialchars($_GET['plate']);
        $carService = new CarService();
        $car = $carService->findByPlate($carPlate);

        if ($car) {
            echo '<form method="POST" action="../Process/process_edit_car.php?id='.$id.'" enctype="multipart/form-data">';
            echo '<input type="hidden" name="plate" value="' . $car->getPlate() . '">';
            echo '<h2>Editar Carro</h2>';
            
            echo '<div class="form-section">';
            echo '<p>Placa <strong>' . $car->getPlate() . '</strong></p>';
            echo '<label for="brand">Marca:</label>';
            echo '<input type="text" name="brand" value="' . $car->getBrand() . '"><br>';
            echo '<label for="model">Modelo:</label>';
            echo '<input type="text" name="model" value="' . $car->getModel() . '"><br>';
            echo '<label for="year">Año:</label>';
            echo '<input type="text" name="year" value="' . $car->getYear() . '"><br>';
            echo '<label for="color">Color:</label>';
            echo '<input type="text" name="color" value="' . $car->getColor() . '"><br>';
            echo '<label for="doors">Puertas:</label>';
            echo '<input type="text" name="doors" value="' . $car->getDoors() . '"><br>';
            echo '<label for="image">Imagen actual:</label>';
            echo '<img src="' . $car->getImage() . '" alt="Imagen actual"><br>';
            echo '<label for="newImage">Nueva imagen:</label>';
            echo '<input type="file" name="newImage" accept="image/*"><br>';
            echo '</div>';
            
            echo '<div class="form-section">';
            echo '<label for="cc">Cilindraje:</label>';
            echo '<input type="text" name="cc" value="' . $car->getCc() . '"><br>';
            echo '<label for="transmission">Transmisión:</label>';
            echo '<select name="transmission">';
            echo '<option value="Manual" ' . ($car->getTransmission() == "Manual" ? 'selected' : '') . '>Manual</option>';
            echo '<option value="Automática" ' . ($car->getTransmission() == "Automática" ? 'selected' : '') . '>Automática</option>';
            echo '<option value="Semi-Automática" ' . ($car->getTransmission() == "Semi-Automática" ? 'selected' : '') . '>Semi-Automática</option>';
            echo '</select><br>';
            echo '<label for="fuelType">Combustible:</label>';
            echo '<select name="fuelType">';
            echo '<option value="Gasolina" ' . ($car->getFuelType() == "Gasolina" ? 'selected' : '') . '>Gasolina</option>';
            echo '<option value="Diesel" ' . ($car->getFuelType() == "Diesel" ? 'selected' : '') . '>Diesel</option>';
            echo '<option value="Híbrido" ' . ($car->getFuelType() == "Híbrido" ? 'selected' : '') . '>Híbrido</option>';
            echo '<option value="Eléctrico" ' . ($car->getFuelType() == "Eléctrico" ? 'selected' : '') . '>Eléctrico</option>';
            echo '</select><br>';
            echo '<label for="used">Usado:</label>';
            echo '<input type="text" name="used" value="' . $car->getUsed() . '"><br>';
            echo '<label for="km">Kilometros:</label>';
            echo '<input type="text" name="km" value="' . $car->getKilometers() . '"><br>';
            echo '<label for="price">Precio:</label>';
            echo '<input type="text" name="price" value="' . $car->getPrice() . '"><br>';
            echo '<label for="status">Estado:</label>';
            echo '<select name="status">';
            echo '<option value="Disponible" ' . ($car->getStatus() == "Disponible" ? 'selected' : '') . '>Disponible</option>';
            echo '<option value="Vendido" ' . ($car->getStatus() == "Vendido" ? 'selected' : '') . '>Vendido</option>';
            echo '</select><br>';
            echo '<button type="submit">Guardar</button>';
            echo '</div>';
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
