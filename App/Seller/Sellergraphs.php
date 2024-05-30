<?php

require_once '../../phplot-6.2.0/phplot.php';
require_once "../Entity/Sale.php";
require_once "../Entity/User.php";
require_once "../Service/SaleService.php";
require_once "../Service/UserService.php";

if (isset($_GET['id'])) {
    $sellerId = htmlspecialchars($_GET['id']);

    $userService = new UserService();
    $saleService = new SaleService();
    $sales = $saleService->findAll();
    $sellers = $userService->findAllSellers();
    $data = array();
    foreach ($sellers as $seller) {
        $salesCount = 0;
        foreach ($sales as $sale) {
            if ($sale->getSellerId() == $seller->getId()) {
                $salesCount++;
            }
        }
        $data[] = array($seller->getFirstName() . ' ' . $seller->getLastName(), $salesCount);
    }

    $plot = new PHPlot(800, 600);
    
    $plot->SetDataValues($data);
    $plot->SetTitle('Cantidad de Ventas por Vendedor');
    $plot->SetXTitle('Vendedor');
    $plot->SetYTitle('Cantidad de Ventas');

    $plot->SetPlotType('bars');
    $plot->DrawGraph();

} else {
    echo "No se recibió ID de usuario.";
}
?>
