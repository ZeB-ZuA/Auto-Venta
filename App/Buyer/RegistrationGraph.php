<?php
require_once "../../phplot-6.2.0/phplot.php";
require_once "../Service/UserService.php";

$userService = new UserService();
$users = $userService->findAll();

$yearlyRegistrations = [];

foreach ($users as $user) {
    $registrationDate = $user->getRegistrationDate();
    $registrationYear = date('Y', strtotime($registrationDate));

    if (!isset($yearlyRegistrations[$registrationYear])) {
        $yearlyRegistrations[$registrationYear] = 0;
    }
    $yearlyRegistrations[$registrationYear]++;
}


ksort($yearlyRegistrations);

$data = [];

foreach ($yearlyRegistrations as $year => $count) {
    $data[] = array($year, $count);
}


$plot = new PHPlot(800, 600);
$plot->SetImageBorderType('plain');
$plot->SetTitle("Usuarios Registrados por Año");
$plot->SetDataType('text-data');
$plot->SetDataValues($data);

$plot->SetPlotType('bars');
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('none');


$plot->SetXLabel('Años');
$plot->SetYLabel('Numero de Usuarios Registrados');


$plot->DrawGraph();
?>
