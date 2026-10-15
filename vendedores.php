<?php
include_once "encabezado.php";
include_once "funciones.php";
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

if ($_SESSION['rol'] !== 'Admin') {
    header("Location: dashboard.php");
    exit;
}
include_once "navbar.php";

$usuarios = obtenerVendedores();
?>
<div class="container">
    <h1>
        <a class="btn btn-success btn-lg" href="agregar_vendedor.php">
            <i class="fa fa-plus"></i>
            Agregar
        </a>
        Vendedores
    </h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($usuarios as $usuario) {
            ?>
                <tr>
                    <td><?php echo $usuario->nombre; ?></td>
                    <td>
                        <a class="btn btn-info" href="editar_vendedor.php?id=<?php echo $usuario->id; ?>">
                            <i class="fa fa-edit"></i>
                            Editar
                        </a>
                    </td>
                    <td>
                        <?php
                    
                            echo '
        <a class="btn btn-danger" href="eliminar_vendedor.php?id=' . $usuario->id . '">
            <i class="fa fa-trash"></i>
            Eliminar
        </a>';
                        
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>