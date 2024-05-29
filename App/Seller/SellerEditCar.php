<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carro</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        form {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 250px;
            font-size: 14px;
        }
        form input[type="text"],
        form select,
        form input[type="file"] {
            width: 100%;
            padding: 6px;
            margin: 6px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        form input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 0;
            cursor: pointer;
            border-radius: 4px;
        }
        form input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 8px auto;
        }
    </style>
</head>

<body>
    <h2>Editar Carro</h2>
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
            echo '<p>Placa <strong>' . $car->getPlate() . '</strong></p>';
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
            echo 'Kilometros: <input type="text" name="km" value="' . $car->getKilometers() . '"><br>';
            echo '<input type="hidden" name="image" value="' . $car->getImage() . '">';
            echo 'Imagen: <img src="' . $car->getImage() . '" alt="Imagen actual"><br>';
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
