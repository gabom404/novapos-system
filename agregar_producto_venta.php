<?php
include_once "funciones.php";
session_start();

if (isset($_POST['agregar'])) {
    if (isset($_POST['codigo'])) {
        $codigo = $_POST['codigo'];
        $producto = obtenerProductoPorCodigo($codigo);
        
        if (!$producto) {
            echo "
            <script type='text/javascript'>
                window.location.href='vender.php';
                alert('No se ha encontrado el producto');
            </script>";
            return;
        }

        if (isset($producto->venta)) {
            $_SESSION['lista'] = agregarProductoALista($producto, $_SESSION['lista']);
            unset($_POST['codigo']);
            header("location: vender.php");
            exit;
        } else {
            echo "
            <script type='text/javascript'>
                window.location.href='vender.php';
                alert('El producto no tiene un precio definido');
            </script>";
            return;
        }
    }
}

if (isset($_GET['id'])) {
    $idProducto = $_GET['id'];
    $producto = obtenerProductoPorId($idProducto);
    
    if (!$producto) {
        echo "
        <script type='text/javascript'>
            window.location.href='vender.php';
            alert('No se ha encontrado el producto');
        </script>";
        return;
    }
    
    $_SESSION['lista'] = agregarProductoALista($producto, $_SESSION['lista']);
    header("location: vender.php");
    exit;
}
?>
