<?php
session_start();

require "function.php";
require "conexion.php";
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


if ($_POST) {
    $nombre = dataForm(htmlspecialchars($_POST['nombre']));
    $apellido = dataForm(htmlspecialchars($_POST['apellido']));
    $fecha_nac = dataForm(htmlspecialchars($_POST['fecha_nac']));
    $grado = dataForm(htmlspecialchars($_POST['grado']));
    $turno = dataForm(htmlspecialchars($_POST['turno']));
    $phone = dataForm(htmlspecialchars($_POST['phone']));
    $parentesco = dataForm(htmlspecialchars($_POST['parentesco']));
    $edad = dataForm(htmlspecialchars($_POST['edad']));
    $cedula_escolar = dataForm(htmlspecialchars($_POST['cedula_escolar']));


    $conex = $mysqli;

    $sql = "INSERT INTO datos_alumnos (nombre, apellido, fecha_nac, grado, turno, telefono, parentesco, edad, cedula_estudiante) VALUES ('$nombre','$apellido','$fecha_nac','$grado','$turno','$phone','$parentesco','$edad','$cedula_escolar')";

    $resultado = mysqli_query($conex, $sql);

    echo "<script>
        alert('Se registro exitosamente');
    </script>";
}
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
                                            <input type="text" class="form-control" name="cedula_escolar" placeholder="Cedula o Cedula Escolar" aria-label="First name">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" aria-label="First name">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="apellido" placeholder="Apellido" aria-label="Last name">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <input type="date" class="form-control" name="fecha_nac" placeholder="Fecha de Nacimiento" aria-label="Fecha de nacimiento">
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect01">Grado</label>
                                                <select class="form-select" name="grado" id="inputGroupSelect01">
                                                    <option selected disabled>Seleciona...</option>
                                                    <option value="1 Nivel">1 Nivel</option>
                                                    <option value="2 Nivel">2 Nivel</option>
                                                    <option value="3 Nivel">3 Nivel</option>
                                                    <option value="1 Ero">1 Ero</option>
                                                    <option value="2 Do">2 Do</option>
                                                    <option value="3 Ero">3 Ero</option>
                                                    <option value="4 To">4 To</option>
                                                    <option value="5 To">5 To</option>
                                                    <option value="6 To">6 To</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect01">Turno</label>
                                                <select class="form-select" name="turno" id="inputGroupSelect01">
                                                    <option selected disabled>Seleciona...</option>
                                                    <option value="Diurno">Diurno</option>
                                                    <option value="Tarde">Tarde</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="phone" placeholder="Telefono" aria-label="Phone">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect01">Parentesco</label>
                                                <select class="form-select" name="parentesco" id="inputGroupSelect01">
                                                    <option selected disabled>Seleciona...</option>
                                                    <option value="mama">Mamá</option>
                                                    <option value="papa">Papá</option>
                                                    <option value="hermano">Hermano</option>
                                                    <option value="abuelo">Abuelo</option>
                                                    <option value="representante legal">Representante Legal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">

                                            <input type="number" class="form-control" name="edad" placeholder="Edad del niñ@" aria-label="Phone">
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