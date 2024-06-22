<?php
require_once("../Service/CarService.php");
require_once("../Entity/Car.php");
require_once("../Entity/User.php");
require_once("../Service/UserService.php");
require_once("../Service/SaleService.php");
require_once("../Entity/Sale.php");

if (isset($_GET['id']) && isset($_GET['plate'])) {
    $idBuyer = htmlspecialchars($_GET['id']);
    $plate = htmlspecialchars($_GET['plate']);
    
    $carService = new CarService();
    $userService = new UserService();
    $saleService = new SaleService();
    
    $car = $carService->findByPlate($plate);
    if ($car) {
        $sellerId = $car->getSellerId();
        
        $buyer = $userService->findById($idBuyer);
        $seller = $userService->findById($sellerId);
        
        if ($buyer && $seller) {
            $carPrice = $car->getPrice();
        
            if ($buyer->getCredit() >= $carPrice) {
                if ($carService->buy($idBuyer, $plate)) {
                    $buyer->setCredit($buyer->getCredit() - $carPrice);
                    $seller->setCredit($seller->getCredit() + $carPrice);
                    
                    $userService->updateCredit($idBuyer, $buyer->getCredit());
                    $userService->updateCredit($sellerId, $seller->getCredit());


                    $sale = new Sale(null, $sellerId, $idBuyer, $plate);
                    if($saleService->create($sale)){
                        echo'Compra realizada con éxito y registrada en la base de datos.';
                    }else{
                        echo'No se pudo registrar la compra en la base de datos.';
                    }
                    
                    echo "Compra realizada con éxito.";
                } else {
                    echo "No se pudo realizar la compra. Inténtalo de nuevo.";
                }
            } else {
                echo "El comprador no tiene suficiente crédito.";
            }
        } else {
            echo "No se pudo encontrar el comprador o el vendedor.";
        }
    } else {
        echo "Carro no encontrado.";
    }
} else {
    echo "No se recibió ID de usuario o placa.";
}
?>
