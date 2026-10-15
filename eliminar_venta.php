<?php
include_once "funciones.php";

if(isset($_GET['id'])){
    $ventaId = $_GET['id'];
    eliminarVenta($ventaId);
    header("Location: reporte_ventas.php");
    exit();
}
?>

