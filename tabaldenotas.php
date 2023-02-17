<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
$usuario = $_SESSION['usuario'];
$id = $_SESSION['id'];
$tipo_usuario = $_SESSION['tipo_usuario'];
if ($tipo_usuario == 1) {
    $where = "";
} elseif ($tipo_usuario == 2) {
    $where = "WHERE id=$id";
}

require "conexion.php";
$sql = "SELECT e.primer_periodo, e.segundo_periodo, e.tercer_periodo, e.total, a.nombre, a.cedula_estudiante, g.grado FROM notas AS e INNER JOIN datos_alumnos AS a ON a.id_alumno=e.id_alumno INNER JOIN grados AS g ON a.id_grado=g.id_grado";
$resultado = $mysqli->query($sql);


$sql1 = "SELECT * FROM grados";
$resultado1 = $mysqli->query($sql1);
?>



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistema de Gestion Estudiantil</title>
    <!-- FAVICON -->
    <link rel="icon" href="img/logoEscuela.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="principal.php"> Gestion Estudiantil</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $usuario; ?><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Cerrar Sesion</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Configuración</div>
                        <a class="nav-link" href="principal.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Inicio
                        </a>
                        <?php
                        if ($tipo_usuario == 1) { ?>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Administración
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="registrodeestudiantes.php">Registro de Usuario</a>
                                    <a class="nav-link" href="registrodeprofesores.php">Registro de Profesores</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Control
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Estudiantes
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="registrodeestudiantes.php">Registro de estudiantes</a>
                                            <a class="nav-link" href="tabladeestudiantes.php">Listado de Estudiantes</a>
                                            <a class="nav-link" href="tabaldenotas.php">Consulta de Notas</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth1" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Profesores
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="tabladeprofesores.php">Listado de Profesores</a>
                                            <a class="nav-link" href="registrarnotas.php">Registro de Notas</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                        <?php }  ?>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Sistema de Gestion Estudiantil</h1>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- <a href="reportenotas.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"> Registrar Notas</a> -->
                        <a href="registrodeprofesores.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"> Registrar Notas</a>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Listado de usuarios
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Primer Periodo</th>
                                        <th>Segundo Periodo</th>
                                        <th>Tercer Periodo</th>
                                        <th>Definitiva</th>
                                        <th>Estudiante</th>
                                        <th>Grado</th>
                                        <th>Cedula Escolar O de Identidad</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Primer Periodo</th>
                                        <th>Segundo Periodo</th>
                                        <th>Tercer Periodo</th>
                                        <th>Definitiva</th>
                                        <th>Estudiante</th>
                                        <th>Grado</th>
                                        <th>Cedula Escolar O de Identidad</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    while ($row = $resultado->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php
                                                echo $row['primer_periodo'];
                                                ?></td>
                                            <td><?php
                                                echo $row['segundo_periodo'];
                                                ?></td>
                                            <td><?php
                                                echo $row['tercer_periodo'];
                                                ?></td>
                                            <td><?php
                                                echo $row['total'];
                                                ?></td>
                                            <td><?php
                                                echo $row['nombre'];
                                                ?></td>
                                            <td><?php
                                                echo $row['grado'];
                                                ?></td>
                                            <td><?php
                                                echo $row['cedula_estudiante'];
                                                ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Developer Group 2022</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>