<?php
require_once "../../phplot-6.2.0/phplot.php";
require_once "../Service/UserService.php";

$userService = new UserService();
$users = $userService->findAll();

// Contadores para los roles
$roles = [];

foreach ($users as $user) {
    $rol = $user->getRol();
    if (isset($roles[$rol])) {
        $roles[$rol]++;
    } else {
        $roles[$rol] = 1;
    }
}

$plot = new PHPlot(800, 600);
$data = [];
foreach ($roles as $rol => $count) {
    $data[] = array($rol, $count);
}

$plot->SetImageBorderType('plain');
$plot->SetTitle('Distribución de Usuarios por Rol');
$plot->SetDataType('text-data');
$plot->SetDataValues($data);
$plot->SetPlotType('bars');
$plot->SetXLabel('Rol');
$plot->SetYLabel('Número de Usuarios');

$plot->DrawGraph();
?>
