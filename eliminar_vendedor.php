<?php
$id = $_GET['id'];
if (!$id) {
    echo 'No se ha seleccionado el usuario';
    exit;
}
include_once "funciones.php";

$resultado = eliminarVendedor($id);
if(!$resultado){
    echo "Error al eliminar";
    return;
}

header("Location: vendedores.php");
?>