<?php
require_once "../Service/CarService.php";

if(isset($_GET['id'])) {
    $sellerId = htmlspecialchars($_GET['id']);

    $carService = new CarService();

    $cars = $carService->findBySellerId($sellerId);

    if($cars) {
   
        foreach($cars as $car) {
            echo "ID: " . $car->getId() . "<br>";
            echo "Placa: " . $car->getPlate() . "<br>";
            echo "Marca: " . $car->getBrand() . "<br>";
            echo "<hr>";
        }
    } else {
        echo "Este vendedor no tiene carros disponibles.";
    }
} else {
    echo "No se proporcionó una ID de vendedor.";
}
?>
