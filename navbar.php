<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php"); 
    exit; 
}

?>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon">
                <img src="logo_principal.png" alt="" width="100" height="100">
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Inicio -->
        <?php $rol = $_SESSION['rol']; 
        if ($rol === 'Admin') {
        echo'
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-home"></i>
                <span>Inicio</span>
            </a>
        </li>

        <!-- Nav Item - Productos -->
        <li class="nav-item">
            <a class="nav-link" href="productos.php">
                <i class="fas fa-shopping-cart"></i>
                <span>Productos</span>
            </a>
        </li>

        <!-- Nav Item - Usuarios -->
        <li class="nav-item">
            <a class="nav-link" href="usuarios.php">
                <i class="fas fa-users"></i>
                <span>Usuarios</span>
            </a>
        </li>

        <!-- Nav Item - Usuarios -->
        <li class="nav-item">
            <a class="nav-link" href="vendedores.php">
                <i class="fas fa-users"></i>
                <span>Vendedores</span>
            </a>
        </li>

        <!-- Nav Item - Clientes -->
        <li class="nav-item">
            <a class="nav-link" href="clientes.php">
                <i class="fas fa-user-friends"></i>
                <span>Clientes</span>
            </a>
        </li>

        <!-- Nav Item - Vender -->
        <li class="nav-item">
            <a class="nav-link" href="vender.php">
                <i class="fas fa-cash-register"></i>
                <span>Vender</span>
            </a>
        </li>

        <!-- Nav Item - Reporte ventas -->
        <li class="nav-item">
            <a class="nav-link" href="reporte_ventas.php">
                <i class="fas fa-file-alt"></i>
                <span>Reporte ventas</span>
            </a>
        </li>
        ';}elseif ($rol === 'Vendedor'){ echo'
            <!-- Nav Item - Clientes -->
            <li class="nav-item">
                <a class="nav-link" href="clientes.php">
                    <i class="fas fa-user-friends"></i>
                    <span>Clientes</span>
                </a>
            </li>
    
            <!-- Nav Item - Vender -->
            <li class="nav-item">
                <a class="nav-link" href="vender.php">
                    <i class="fas fa-cash-register"></i>
                    <span>Vender</span>
                </a>
            </li>
    
            <!-- Nav Item - Reporte ventas -->
            <li class="nav-item">
                <a class="nav-link" href="reporte_ventas.php">
                    <i class="fas fa-file-alt"></i>
                    <span>Reporte ventas</span>
                </a>
            </li>';
        }
            ?>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Perfil -->
                    <li class="nav-item">
                        <a href="perfil.php" class="nav-link">
                            <i class="fas fa-user"></i>
                            <span>Perfil</span>
                        </a>
                    </li>

                    <!-- Nav Item - Salir -->
                    <li class="nav-item">
                        <a href="cerrar_sesion.php" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Salir</span>
                        </a>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
