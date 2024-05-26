<?php
require_once "../Service/CarService.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['Image']) && $_FILES['Image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/';
        $uploadFile = $uploadDir . basename($_FILES['Image']['name']);
        if (move_uploaded_file($_FILES['Image']['tmp_name'], $uploadFile)) {
            $imagePath = $uploadFile;
        } else {
            echo "Failed to upload image.";
            exit;
        }
    } else {
        echo "No image uploaded or upload error.";
        exit;
    }

    $carService = new CarService();

    $car = new Car(
        $_POST['ID_Seller'],
        $_POST['Plate'],
        $_POST['Brand'],
        $_POST['Model'],
        $_POST['Year'],
        $_POST['Color'],
        $_POST['Doors'],
        $_POST['Cc'],
        $_POST['Transmission'],
        $_POST['Fuel_Type'],
        $_POST['Used'],
        $_POST['Kilometers'],
        $imagePath, // Save the image path
        $_POST['Price'],
        $_POST['status']
    );

    if ($carService->save($car)) {
        header("Location: ../Vendor/VendorCars.php?id=" . $_POST['ID_Seller']);
        exit;
    } else {
        echo "Failed to add car.";
    }
}
?>
