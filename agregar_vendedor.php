<?php
include_once "encabezado.php";
include_once "navbar.php";


?>
<div class="container">
    <h3>Agregar Vendedor</h3>
    <form method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Vendedor</label>
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Escribe el nombre de usuario. Ej. Paco">
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
    
    if(empty($nombre)
   ){
        echo'
        <div class="alert alert-danger mt-3" role="alert">
            Debes completar todos los datos.
        </div>';
        return;
    } 
    include_once "funciones.php";
    $resultado = registrarVendedor($nombre);
    if($resultado){
        echo'
        <div class="alert alert-success mt-3" role="alert">
            Usuario registrado con éxito.
        </div>';
    }
}
?>