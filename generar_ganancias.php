<?php
include_once "funciones.php";
require('FPDF/fpdf.php');

$totalVenta = $_POST['totalVentas'];
$totalTarjeta = $_POST['totalTarjeta'];
$totalEfectivo = $_POST['totalEfectivo'];

// Establecer la zona horaria
date_default_timezone_set('America/El_Salvador');

$pdf = new FPDF($orientation='P', $unit='mm', array(45, 70));
$pdf->SetMargins(1, 0, 10);
$pdf->AddPage();

// Título del ticket
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetX(10);
$pdf->Cell(0, 10, 'EMPIRE BARBER SHOP', 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);

// Fecha y hora
$pdf->Cell(0, 5, 'Fecha: ' . date('d/m/Y H:i:s'), 0, 1);

// Línea separadora
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.2);
$pdf->Line(1, $pdf->GetY(), 44, $pdf->GetY());
$pdf->Ln(2);

// Total de la venta
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'Efectivo:', 0, 0, 'L');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(5, 8, '$' . $totalEfectivo, 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'Tarjeta:', 0, 0, 'L');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1, 8, '$' . $totalTarjeta, 0, 1, 'R');

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'Total Venta:', 0, 0, 'L');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(10, 8, '$' . $totalVenta, 0, 1, 'R');

$pdf->Output();
?>
