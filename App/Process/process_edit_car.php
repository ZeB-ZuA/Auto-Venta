<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (isset($_GET['id'])) {
    $sellerId = htmlspecialchars($_GET['id']);
}


    if (isset($_POST['plate'])) {

        if ($_FILES['newImage']['error'] === UPLOAD_ERR_OK && is_uploaded_file($_FILES['newImage']['tmp_name'])) {
    
            $image = $_FILES['newImage']['tmp_name'];
        } else {
            $image = $_POST['image'];
        }
        



        $plate = $_POST['plate'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $color = $_POST['color'];
        $doors = $_POST['doors'];
        $cc = $_POST['cc'];
        $transmission = $_POST['transmission'];
        $fuelType = $_POST['fuelType'];
        $used = $_POST['used'];
        $kilometers = $_POST['km'];
        $price = $_POST['price'];
        $status = $_POST['status'];

        require_once "../Service/CarService.php";
        $carService = new CarService();
        $car = $carService->findByPlate($plate);

        if ($car) {
            $car->setBrand($brand);
            $car->setModel($model);
            $car->setYear($year);
            $car->setColor($color);
            $car->setDoors($doors);
            $car->setCc($cc);
            $car->setTransmission($transmission);
            $car->setFuelType($fuelType);
            $car->setUsed($used);
            $car->setKilometers($kilometers);
            $car->setImage($image);
            $car->setPrice($price);
            $car->setStatus($status);
               
            if ($carService->update($car)) {
                header("location: ../Seller/SellerCars.php?id=$sellerId");
            } else {
                echo "Error al actualizar el carro.";
            }
        } else {
            echo "Carro no encontrado.";
        }
    } else {
        echo "Placa del carro no especificada.";
    }
} else {
    echo "El formulario no ha sido enviado.";
}
?>
