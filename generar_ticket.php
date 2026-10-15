<?php
include_once "funciones.php";
require('FPDF/fpdf.php');

// Establecer la zona horaria
date_default_timezone_set('America/El_Salvador');

// Obtén el ID de la venta desde el parámetro de la URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Obtén los datos de la venta específica
$venta = obtenerVentaPorId($id);

if (!$venta) {
    die("No se encontró la venta especificada.");
}

$clienteId = $venta->idCliente;
$cliente = obtenerClientePorId($clienteId);

// Función para obtener los datos del cliente por su ID
if (!$cliente) {
    die("No se encontró el cliente asociado a la venta.");
}

$usuarioId = $venta->idUsuario;
$usuario = obtenerUsuarioPorId($usuarioId);

if (!$usuario) {
    die("No se encontró el usuario asociado a la venta.");
}

$pdf = new FPDF($orientation='P', $unit='mm', array(45, 90));
$pdf->SetMargins(1, 0, 10);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 8);

// Agrega el título del ticket
$pdf->Cell(40, 10, 'EMPIRE BARBER SHOP', 0, 1, 'C');
$pdf->Ln(2);


// $pdf->SetFont('Arial', 'B', 5);
$pdf->SetFont('Arial', 'B', 5, '', true, 'UTF-8');
$pdf->Cell(0, 5, 'Venta No. ' . $venta->id, 0, 1);
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(0, 5, 'Fecha: ' . date('d/m/Y H:i:s', strtotime($venta->fecha)), 0, 1);
$pdf->Cell(0, 5, 'Cliente: ' . utf8_decode($cliente->nombre), 0, 1);
$pdf->Cell(0, 5, 'Vendedor: ' . $venta->vendedor, 0, 1);

// Agrega la tabla de productos
$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(23, 5, 'Producto', 0, 0, 'L');
$pdf->Cell(10, 5, 'Cantidad', 0, 0, 'L');
$pdf->Cell(10, 5, 'Precio', 0, 0, 'L');
$pdf->Cell(0, 5, 'Total', 0, 1, 'L');
$pdf->SetFont('Arial', '', 5);

$totalVenta = 0;

foreach ($venta->productos as $producto) {
    $totalProducto = $producto->cantidad * $producto->precio;
    $pdf->Cell(23, 5, utf8_decode($producto->nombre), 0, 0, 'L');
    $pdf->Cell(10, 5, $producto->cantidad, 0, 0, 'L');
    $pdf->Cell(20, 5, '$' . $producto->precio, 0, 0, 'L');
    $pdf->Cell(20, 5, '$' . $totalProducto, 0, 1, 'L');

    $totalVenta += $totalProducto;
}

$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(6.5, 5, 'Total', 0, 0, 'R');
$pdf->Cell(0, 5, '$' . $totalVenta, 0, 1, 'L');

$pdf->Output();
?>
