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

$id = $_GET['id'];
if (!$id) {
    echo 'No se ha seleccionado el usuario';
    exit;
}
$usuario = obtenerVendedorPorId($id);
?>
<div class="container">
    <h3>Editar Vendedor</h3>
    <form method="post">
        <div class="mb-3">
            <label for="usuario" class="form-label">Nombre de vendedor</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $usuario->nombre;?>" id="vendedor" placeholder="Escribe el nombre de usuario. Ej. Paco">
        </div>
        <div class="text-center mt-3">
            <input type="submit" name="registrar" value="Registrar" class="btn btn-primary btn-lg">
            
            </input>
            <a href="vendedores.php" class="btn btn-danger btn-lg">
                <i class="fa fa-times"></i> 
                Cancelar
            </a>
        </div>
    </form>
</div>
<?php
if(isset($_POST['registrar'])){
    $nombre = $_POST['nombre'];
    if(empty($nombre)){
        echo'
        <div class="alert alert-danger mt-3" role="alert">
            Debes completar todos los datos.
        </div>';
        return;
    } 

    include_once "funciones.php";
    $resultado = editarVendedor($nombre, $id);
    if($resultado){
        echo'
        <div class="alert alert-success mt-3" role="alert">
            Información de usuario actualizada con éxito.
        </div>';
    }
    
}
?>