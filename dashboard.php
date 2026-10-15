<?php
include_once "encabezado.php";
include_once "navbar.php";
include_once "funciones.php";
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php"); 
    exit;
}
$cartas = [
    ["titulo" => "Total ventas", "icono" => "fa fa-money-bill", "total" => "$".obtenerTotalVentas(), "color" => "#A71D45"],
    ["titulo" => "Ventas hoy", "icono" => "fa fa-calendar-day", "total" => "$".obtenerTotalVentasHoy(), "color" => "#2A8D22"],
    ["titulo" => "Ventas semana", "icono" => "fa fa-calendar-week", "total" => "$".obtenerTotalVentasSemana(), "color" => "#223D8D"],
    ["titulo" => "Ventas mes", "icono" => "fa fa-calendar-alt", "total" => "$".obtenerTotalVentasMes(), "color" => "#D55929"],
];

$totales = [
    ["nombre" => "Total productos", "total" => obtenerNumeroProductos(), "imagen" => "img/productos.png"],
    ["nombre" => "Ventas registradas", "total" => obtenerNumeroVentas(), "imagen" => "img/ventas.png"],
    ["nombre" => "Usuarios registrados", "total" => obtenerNumeroUsuarios(), "imagen" => "img/usuarios.png"],
    ["nombre" => "Clientes registrados", "total" => obtenerNumeroClientes(), "imagen" => "img/clientes.png"],
];

$ventasUsuarios = obtenerVentasPorUsuario();
$ventasClientes = obtenerVentasPorCliente();
$productosMasVendidos = obtenerProductosMasVendidos();
?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <h1 class="h3 mb-4 text-gray-800">Hola, <?= $_SESSION['usuario'] ?></h1>

            <div class="row">
                <?php foreach($totales as $total){?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $total['nombre'] ?></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total['total'] ?></div>
                                </div>
                                <div class="col-auto">
                                    <img class="img-thumbnail" src="<?= $total['imagen'] ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            

            <?php include_once "cartas_totales.php"?>

            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ventas por usuarios</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre usuario</th>
                                            <th>Número ventas</th>
                                            <th>Total ventas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($ventasUsuarios as $usuario) {?>
                                        <tr>
                                            <td><?= $usuario->usuario ?></td>
                                            <td><?= $usuario->numeroVentas ?></td>
                                            <td>$<?= $usuario->total ?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ventas por clientes</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre cliente</th>
                                            <th>Número compras</th>
                                            <th>Total ventas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($ventasClientes as $cliente) {?>
                                        <tr>
                                            <td><?= $cliente->cliente ?></td>
                                            <td><?= $cliente->numeroCompras ?></td>
                                            <td>$<?= $cliente->total ?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h4>10 Productos más vendidos</h4>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Unidades vendidas</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productosMasVendidos as $producto) {?>
                        <tr>
                            <td><?= $producto->nombre ?></td>
                            <td><?= $producto->unidades ?></td>
                            <td>$<?= $producto->total ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>