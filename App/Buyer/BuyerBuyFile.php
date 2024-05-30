<?php
require_once "../../fpdf186/fpdf.php";
require_once "../Entity/User.php";
require_once "../Entity/Car.php";
require_once "../Service/SaleService.php";
require_once "../Service/UserService.php";
require_once "../Service/CarService.php";

if (isset($_GET['id'])) {
    $buyerId = htmlspecialchars($_GET['id']);
    $userService = new UserService();
    $saleService = new SaleService();
    $carService = new CarService();
    $buyer = $userService->findById($buyerId);
    $cars = $carService->findBySellerId($buyerId);

    $pdf = new FPDF();

    $pdf->AddPage();
    $pdf->SetFont("Arial", "B", 16);
    $pdf->Cell(0, 10, utf8_decode('Reporte de Carros Comprados'), 0, 1, 'C');
    
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Cell(0, 10, utf8_decode('Información del Comprador'), 0, 1);
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(0, 10, utf8_decode('Nombre: ' . $buyer->getFirstName() . ' ' . $buyer->getLastName()), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Email: ' . $buyer->getEmail()), 0, 1);
    $pdf->Cell(0, 10, utf8_decode('Crédito: ' . $buyer->getCredit()), 0, 1);
    $pdf->Ln(10);

    $widths = array(30, 40, 40, 40, 40, 40);
    
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Cell($widths[1], 10, utf8_decode('Marca'), 1);
    $pdf->Cell($widths[2], 10, utf8_decode('Modelo'), 1);
    $pdf->Cell($widths[3], 10, utf8_decode('Año'), 1);
    $pdf->Cell($widths[4], 10, utf8_decode('Color'), 1);
    $pdf->Cell($widths[5], 10, utf8_decode('Precio'), 1);
    $pdf->Ln();

    $pdf->SetFont("Arial", "", 12);

    foreach ($cars as $car) {
        $pdf->Cell($widths[1], 10, utf8_decode($car->getBrand()), 1);
        $pdf->Cell($widths[2], 10, utf8_decode($car->getModel()), 1);
        $pdf->Cell($widths[3], 10, utf8_decode($car->getYear()), 1);
        $pdf->Cell($widths[4], 10, utf8_decode($car->getColor()), 1);
        $pdf->Cell($widths[5], 10, utf8_decode($car->getPrice()), 1);
        $pdf->Ln();
    }
   
    $pdf->SetAutoPageBreak(false); 
    $pdf->SetY(-15);
    $pdf->SetFont("Arial", "I", 8);
    $pdf->Cell(0, 10, utf8_decode('Reporte generado el ' . date('Y-m-d H:i:s')), 0, 1, 'C');
    $pdf->Output('D', 'reporte_carros_comprados.pdf');

    $pdf->Output();
} else {
    echo "No se recibió ID de comprador.";
}
?>
