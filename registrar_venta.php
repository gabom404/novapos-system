<?php
include_once "funciones.php";

session_start();
$productos = $_SESSION['lista'];
$idUsuario = $_SESSION['idUsuario'];
$total = calcularTotalLista($productos);
$idCliente = $_SESSION['clienteVenta'];
$vendedor = $_SESSION['vendedor'];
$metodo = $_SESSION['metodo'];

if (count($productos) === 0) {
  header("Location: vender.php");
  exit;
}

$resultado = registrarVenta($productos, $idUsuario, $idCliente  ,$vendedor, $metodo, $total);

if (!$resultado) {
  echo "<script>alert('Error al registrar la venta');</script>";
} else {
  $_SESSION['lista'] = [];
  $_SESSION['clienteVenta'] = "";

  $ultimoid = obtenerUltimoIdVenta();
    echo "<script>window.open('generar_ticket.php?id=$ultimoid', '_blank');</script>";  
    echo "<script>
      setTimeout(function() {
        window.location.href = 'vender.php?q=success';
      }, 1000); 
    </script>";


}
?>
