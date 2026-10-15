<?php
include_once "encabezado.php";
$alerta = ""; 
if(isset($_POST['ingresar'])){
    if(empty($_POST['usuario']) || empty($_POST['password'])){
        $alerta = '
        <div class="alert alert-warning mt-3" role="alert">
            Debes completar todos los datos.
            <a href="index.php">Regresar</a>
        </div>';
    } else {
        include_once "funciones.php";

        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        session_start();
        $datosSesion = iniciarSesion($usuario, $password);

        if(!$datosSesion){
            $alerta = '
            <div class="alert alert-danger mt-3" role="alert">
                Nombre de usuario y/o contraseña incorrectas.
                <a href="index.php">Regresar</a>
            </div>';
        } else {
            $_SESSION['usuario'] = $datosSesion->usuario;
            $_SESSION['idUsuario'] = $datosSesion->id;
            $_SESSION['rol'] = $datosSesion->rol;
            header("location: dashboard.php");
            exit; 
        }
    }
}

?>


<?php echo $alerta; ?>


<div class="container">
    <div class="row m-5 no-gutters shadow-lg">
        <div class="col-md-6 d-none d-md-block">
            <img src="logo_principal.png" class="img-fluid" style="min-height:100%;" />
        </div>
        <div class="col-md-6 bg-white p-5">
            <h3 class="pb-3">Iniciar sesión</h3>
            <div>
                <form action="index.php" method="post">
                    <div class="form-group pb-3">
                        <input type="text" placeholder="Usuario" class="form-control" name="usuario" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group pb-3">
                        <input type="password" placeholder="Contraseña" class="form-control" name="password" id="exampleInputPassword1">
                    </div>

                    <div class="pb-2">
                        <button type="submit" name="ingresar" class="btn btn-primary w-100 font-weight-bold mt-2">Ingresar</button>
                    </div>
                </form>
             </div>
        </div>
    </div>
</div>
