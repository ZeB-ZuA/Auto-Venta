<?php
require_once "../../fpdf186/fpdf.php";
require_once "../Service/CarService.php";

class PDF extends FPDF
{
    // Header
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte General de Carros', 0, 1, 'C');
        $this->Ln(10);
    }

    // Footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }

    // Table
    function CarTable($header, $data)
    {
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(200, 220, 255);
        $widths = [40, 50, 100];

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($widths[$i], 10, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();

        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            $this->Cell($widths[0], 40, $row['plate'], 1);
            $this->Cell($widths[1], 40, $this->Image($row['image'], $this->GetX(), $this->GetY(), 30), 1);
            $this->Cell($widths[2], 40, $row['status'], 1);
            $this->Ln();
        }
    }
}

$carService = new CarService();
$cars = $carService->findAll();

$data = [];

foreach ($cars as $car) {
    $data[] = [
        'plate' => $car->getPlate(),
        'image' => $car->getImage(), // Cambia esta ruta a la ubicación correcta de las imágenes
        'status' => $car->getStatus()
    ];
}

$pdf = new PDF();
$pdf->AddPage();
$header = ['Placa', 'Imagen', 'Estado'];
$pdf->CarTable($header, $data);
$pdf->Output();
?>
