<?php
require_once "../../fpdf186/fpdf.php";
require_once "../Service/UserService.php";

class PDF extends FPDF
{
    // Header
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte General de Usuarios', 0, 1, 'C');
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
    function UserTable($header, $data)
    {
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(200, 220, 255);
        $widths = [30, 80, 50, 30];

        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($widths[$i], 10, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();

        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            $this->Cell($widths[0], 10, utf8_decode($row['idNumber']), 1);
            $this->Cell($widths[1], 10, utf8_decode($row['email']), 1);
            $this->Cell($widths[2], 10, utf8_decode($row['rol']), 1);
            $this->Cell($widths[3], 10, utf8_decode($row['credit']), 1);
            $this->Ln();
        }
    }
}

$userService = new UserService();
$users = $userService->findAll();

$data = [];

foreach ($users as $user) {
    $data[] = [
        'idNumber' => $user->getIdNumber(),
        'email' => $user->getEmail(),
        'rol' => $user->getRol(),
        'credit' => $user->getCredit()
    ];
}

$pdf = new PDF();
$pdf->AddPage();
$header = ['ID Numero', 'Email', 'Rol', 'Crédito'];
$pdf->UserTable($header, $data);
$pdf->Output();
?>
