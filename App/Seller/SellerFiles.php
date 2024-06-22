<?php
require "../../fpdf186/fpdf.php";
require_once "../Entity/Sale.php";
require_once "../Entity/User.php";
require_once "../Entity/Car.php";
require_once "../Service/SaleService.php";
require_once "../Service/UserService.php";
require_once "../Service/CarService.php";

if (isset($_GET['id'])) {
    $sellerId = htmlspecialchars($_GET['id']);
    $userService = new UserService();
    $saleService = new SaleService();
    $carService = new CarService();
    $sales = $saleService->findBySellerId($sellerId);
    $seller = $userService->findById($sellerId);

    $pdf = new FPDF();

    $pdf->AddPage();
    $pdf->SetFont("Arial", "B", 16);
    $pdf->Cell(0, 10, utf8_decode('Reporte de Ventas'), 0, 1, 'C');
    
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Cell(0, 10, utf8_decode('Información del Vendedor'), 0, 1);
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(0, 10, utf8_decode('Nombre: ' . $seller->getFirstName() . ' ' . $seller->getLastName()), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Email: ' . $seller->getEmail()), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Crédito: ' . $seller->getCredit()), 0, 1);
    $pdf->Ln(10);


    $widths = array(30, 40, 40, 40, 40);
    
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Cell($widths[0], 10, utf8_decode('ID de Venta'), 1);
    $pdf->Cell($widths[1], 10, utf8_decode('Vendedor'), 1);
    $pdf->Cell($widths[2], 10, utf8_decode('Comprador'), 1);
    $pdf->Cell($widths[3], 10, utf8_decode('Carro'), 1);
    $pdf->Cell($widths[4], 10, utf8_decode('Fecha de Venta'), 1);
    $pdf->Ln();

    $pdf->SetFont("Arial", "", 12);

    foreach ($sales as $sale) {
        $buyer = $userService->findById($sale->getBuyerId());
        $car = $carService->findByPlate($sale->getPlate());

        $pdf->Cell($widths[0], 10, utf8_decode($sale->getId()), 1);
        $pdf->Cell($widths[1], 10, utf8_decode($seller->getFirstName() . ' ' . $seller->getLastName()), 1);
        $pdf->Cell($widths[2], 10, utf8_decode($buyer->getFirstName() . ' ' . $buyer->getLastName()), 1);
        $pdf->Cell($widths[3], 10, utf8_decode($car->getBrand() . ' ' . $car->getModel()), 1);
        $pdf->Cell($widths[4], 10, utf8_decode($sale->getSaleDate()), 1);
        $pdf->Ln();
    }
   
    $pdf->SetAutoPageBreak(false); 
    $pdf->SetY(-15);
    $pdf->SetFont("Arial", "I", 8);
    $pdf->Cell(0, 10, utf8_decode('Reporte generado el ' . date('Y-m-d H:i:s')), 0, 1, 'C');
    $pdf->Output('D', 'reporte_ventas.pdf');

    $pdf->Output();
    

} else {
    echo "No se recibió ID de usuario.";
}
?>
