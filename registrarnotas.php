<?php
session_start();
require "conexion.php";
require "function.php";

// Autenticación por session 
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

// Envio de notas mediante el formulario
if ($_POST) {
    $alumno = dataForm(htmlspecialchars($_POST['alumno']));
    $primer_periodo = dataForm(htmlspecialchars($_POST['primer_periodo']));
    $segundo_periodo = dataForm(htmlspecialchars($_POST['segundo_periodo']));
    $tercer_periodo = dataForm(htmlspecialchars($_POST['tercer_periodo']));
    $definitiva = dataForm(htmlspecialchars($_POST['definitiva']));

    $conex = $mysqli;

    $sql = "INSERT INTO notas (primer_periodo, segundo_periodo, tercer_periodo, total , id_alumno) VALUES ('$primer_periodo','$segundo_periodo','$tercer_periodo','$definitiva','$alumno')";

    $resultado = mysqli_query($conex, $sql);

    echo "<script>
        alert('Se registro exitosamente');
    </script>";
}

$conex = $mysqli;
$sql = "SELECT id_alumno, nombre FROM datos_alumnos";
$resultado1 = mysqli_query($conex, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dr. Manuel Diaz Rodriguez|Registro de Estudiantes</title>
    <!-- FAVICON -->
    <link rel="icon" href="assets/img/logoEscuela.png">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/SweetAlert/dist/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
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
                    <h1 class="mt-4  d-flex justify-content-center">Registro de Alumnos</h1>
                </div>
                <div class="container">
                    <div class="card text-center">
                        <div class="card-header">
                            Registro de Estudiante
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Ingrese los datos</h5>
                            <br>
                            <div class="row">
                                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" name="primer_periodo" placeholder="Primer Periodo" aria-label="First name">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="segundo_periodo" placeholder="Segundo Periodo" aria-label="Last name">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" name="tercer_periodo" placeholder="Tercer Periodo" aria-label="Fecha de nacimiento">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="definitiva" placeholder="Definitiva" aria-label="Fecha de nacimiento">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect01">Nombre del alumno</label>
                                                <select name="alumno" id="" class="form-select">
                                                    <?php foreach ($resultado1  as $row) : ?>
                                                        <option value="<?php echo $row['id_alumno']; ?>"><?php echo $row['nombre']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">

                                            <br>
                                            <button class="btn btn-success" type="submit" name="insertar">Enviar</button>
                                            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Refrescar</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                if (isset($_GET['err']) && is_numeric($_GET['err']) && $_GET['err'] > 0 && $_GET['err'] < 3)


                                    echo '	<div class="alert alert-danger d-flex align-items-start" role="alert">
    					<div>'
                                        . $messages[$_GET['err']] .
                                        ' 		</div>
					</div>';

                                ?>
                            </div>
                        </div>
                    </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; DeveloperGroup 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./assets/SweetAlert/dist/sweetalert2.all.min.js"></script>
    <script src="js/scripts.js"></script>

</body>

</html>