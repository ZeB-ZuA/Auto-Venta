<?php
require_once "../Entity/User.php";
require_once "../Entity/Car.php";
require_once "../Service/SaleService.php";
require_once "../Service/UserService.php";
require_once "../Service/CarService.php";
require_once '../../phplot-6.2.0/phplot.php';

if (isset($_GET['id'])) {
    $buyerId = htmlspecialchars($_GET['id']);
    $userService = new UserService();
    $saleService = new SaleService();
    $carService = new CarService();
    $buyer = $userService->findById($buyerId);
    $cars = $carService->findBySellerId($buyerId);

    // Contadores para autos usados y nuevos
    $usedCarsCount = 0;
    $newCarsCount = 0;

    // Contar la cantidad de autos usados y nuevos
    foreach ($cars as $car) {
        if ($car->getUsed() === 'Si') {
            $usedCarsCount++;
        } else {
            $newCarsCount++;
        }
    }

    // Configuración de datos para PHPlot
    $data = array(
        array('Usados', $usedCarsCount),
        array('Nuevos', $newCarsCount)
    );

    // Configurar el gráfico
    $plot = new PHPlot(400, 300);
    $plot->SetTitle('Distribución de Carros Comprados');
    $plot->SetDataType('text-data');
    $plot->SetDataValues($data);
    $plot->SetPlotType('bars');
    $plot->SetXTickLabelPos('none');
    $plot->SetDataColors(array('red', 'blue')); // Colores para autos usados y nuevos
    $plot->SetLegend(array('Usados', 'Nuevos'));

    // Generar el gráfico
    $plot->DrawGraph();

} else {
    echo "No se recibió ID de comprador.";
}
?>
