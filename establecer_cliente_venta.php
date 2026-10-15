<?php
session_start();
$cliente = $_POST['idCliente'];
$vendedor = $_POST['vendedor'];
$metodo = $_POST['metodo'];

$_SESSION['clienteVenta'] = $cliente;
$_SESSION['vendedor'] = $vendedor;
$_SESSION['metodo'] = $metodo;


header("location: vender.php");
?>