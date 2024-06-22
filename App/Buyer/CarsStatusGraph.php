<?php
require_once "../../phplot-6.2.0/phplot.php";
require_once "../Service/CarService.php";

$carService = new CarService();

// Contadores para autos usados y nuevos
$usedCarsCount = 0;
$newCarsCount = 0;

$Soldcars = $carService->findByStatus('Vendido');
$aviableCars = $carService->findByStatus('Disponiple');


$usedCarsCount = count($Soldcars);
$newCarsCount = count($aviableCars);

$plot = new PHPlot(800, 600);

$data = array(
    array('Vendidos', $usedCarsCount),
    array('Disponibles', $newCarsCount)
);
$plot->SetImageBorderType('plain');

$plot->SetTitle('Carros Vendidos vs. Disponibles');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);
$plot->SetPlotType('pie');


foreach ($data as $row) {
    $plot->SetLegend(utf8_decode($row[0]). '('. $row[1].')');
}

$plot->SetDataColors(array('red', 'blue'));
$plot->DrawGraph();


?>