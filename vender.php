<?php
include_once "encabezado.php";
include_once "navbar.php";
include_once "funciones.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

$_SESSION['lista'] = (isset($_SESSION['lista'])) ? $_SESSION['lista'] : [];
$total = calcularTotalLista($_SESSION['lista']);
$clientes = obtenerClientes();
$vendedores = obtenerVendedores();
$clienteSeleccionado = (isset($_SESSION['clienteVenta'])) ? obtenerClientePorId($_SESSION['clienteVenta']) : null;
?>

<div class="container mt-3">
  <form action="agregar_producto_venta.php" method="post" class="row">
    <div class="col-10">
      <input class="form-control form-control-lg" name="codigo" autofocus id="codigo" type="text" placeholder="Código de barras del producto" aria-label="codigoBarras">
    </div>
    <div class="col">
      <input type="submit" value="Agregar" name="agregar" class="btn btn-success mt-2">
    </div>
  </form>

  <?php
  $productos = obtenerProductos();
  ?>

  <div class="container mt-3">
    <h2>Lista de Productos</h2>
    <?php
    if(isset($_REQUEST['q'])){
        if($_REQUEST['q'] == "success"){

        echo'<div class="alert alert-success mt-3" role="alert">
            Información del producto registrada con éxito.
        </div>';
        }
    }
    ?>
    <table class="table">
      <thead>
        <tr>
          <th>Código</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($productos as $producto) { ?>
          <tr>
            <td><?php echo $producto->codigo; ?></td>
            <td><?php echo $producto->nombre; ?></td>
            <td>$<?php echo $producto->venta; ?></td>
            <td>
              <a href="agregar_producto_venta.php?id=<?php echo $producto->id; ?>" class="btn btn-success">Agregar</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <?php if ($_SESSION['lista']) { ?>
    <div>
      <table class="table">
        <thead>
          <tr>
            <th>Código</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Quitar</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($_SESSION['lista'] as $lista) { ?>
            <tr>
              <td><?php echo $lista->codigo; ?></td>
              <td><?php echo $lista->nombre; ?></td>
              <td>$<?php echo $lista->venta; ?></td>
              <td><?php echo $lista->cantidad; ?></td>
              <td>$<?php echo floatval($lista->cantidad * $lista->venta); ?></td>
              <td>
                <a href="quitar_producto_venta.php?id=<?php echo $lista->id ?>" class="btn btn-danger">
                  <i class="fa fa-times"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

      <form class="row" method="post" action="establecer_cliente_venta.php">
        <div class="col-10">
          <select class="form-select" required aria-label="Default select example" name="idCliente">
            <option selected disabled value="">Selecciona el cliente</option>
            <?php foreach ($clientes as $cliente) { ?>
              <option value="<?php echo $cliente->id ?>"><?php echo $cliente->nombre ?></option>
            <?php } ?>
          </select>
        </div>
        <br><br>
        <div class="col-10">
          <select class="form-select" required aria-label="Default select example" name="vendedor">
            <option selected disabled value="">Selecciona el vendedor</option>
            <?php foreach ($vendedores as $vendedor) { ?>
              <option value="<?php echo $vendedor->nombre ?>"><?php echo $vendedor->nombre ?></option>
            <?php } ?>
          </select>
          <select class="form-select" required aria-label="Default select example" name="metodo">
            <option selected disabled value="">Selecciona el metodo de pago</option>
              <option value="Efectivo">Efectivo</option>
              <option value="Tarjeta">Tarjeta</option>

          </select>
        </div>
        <div class="col-auto">
          <input class="btn btn-info" type="submit" id="vendedor"  value="Seleccionar cliente">
          </input>
        </div>
      </form>

      <?php if ($clienteSeleccionado) { ?>
        <div class="alert alert-primary mt-3" role="alert">
          <b>Cliente seleccionado:</b>
          <br>
          <b>Nombre:</b> <?php echo $clienteSeleccionado->nombre ?><br>
          <b>Teléfono:</b> <?php echo $clienteSeleccionado->telefono ?><br>
          <b>Dirección:</b> <?php echo $clienteSeleccionado->direccion ?><br>
          <a href="quitar_cliente_venta.php" class="btn btn-warning">Quitar</a>
        </div>
        <a class="btn btn-primary btn-lg"    href="registrar_venta.php">
  <i class="fa fa-check"></i>
  Terminar venta
</a>

      <?php } ?>
     
      <div class="text-center mt-3">
        <!-- <a class="btn btn-primary btn-lg" target="_blank" href="generar_ticket.php?='<?php echo $lista->id; ?>'">
          <i class="fa fa-file"></i>
          Generar ticket
        </a>
        <a class="btn btn-danger btn-lg" href="cancelar_venta.php">
          <i class="fa fa-times"></i>
          Cancelar
        </a> -->
      </div>
    </div>
  <?php } ?>

</div>
