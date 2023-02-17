<?php
session_start();
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
    <link rel="icon" href="img/logoEscuela.png">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/SweetAlert/dist/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        $conex = $mysqli;

        $nombre = htmlspecialchars($_POST['nombre']);
        $grado = htmlspecialchars($_POST['grado']);
        $turno = htmlspecialchars($_POST['turno']);
        $phone = htmlspecialchars($_POST['phone']);
        $correo = htmlspecialchars($_POST['correo']);
        $seccion = htmlspecialchars($_POST['seccion']);

        $sql = "UPDATE profesores SET nombre='" . $nombre . "', telefono='" . $phone . "', grado='" . $grado . "', correo='" . $correo . "', turno='" . $turno . "', seccion='" . $seccion . "'";
        $resultado = mysqli_query($conex, $sql);

        if ($resultado) {
            echo "<script>
                alert('Los cambios han sido realizados exitosamente');
                location.assign('tabladeprofesores.php');
            </script>";
        } else {
            echo "<script>
                alert('Los cambios NO han sido realizados exitosamente');
                location.assign('tabladeprofesores.php');
            </script>";
        }

        mysqli_close($conex);
    } else {
        $id = $_GET['id'];
        $conex = $mysqli;
        $sql = "SELECT * FROM profesores WHERE id_profesor='" . $id . "'";
        $resultado = mysqli_query($conex, $sql);

        $row = mysqli_fetch_assoc($resultado);
        $nombre = $row['nombre'];
        $phone = $row['telefono'];
        $grado = $row['grado'];
        $correo = $row['correo'];
        $turno = $row['turno'];
        $seccion = $row['seccion'];

        mysqli_close($conex);

    ?>
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
                                                <a class="nav-link" href="password.html">Consulta de Notas</a>
                                            </nav>
                                        </div>
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth1" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                            Profesores
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="pagesCollapseAuth1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="tabladeprofesores.php">Listado de Profesores</a>
                                                <a class="nav-link" href="password.html">Registro de Notas</a>
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
                                                <input type="text" class="form-control" name="nombre" placeholder="Nombre" aria-label="First name" value="<?php echo $nombre; ?>">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" name="phone" placeholder="Telefono" aria-label="Last name" value="<?php echo $phone; ?>">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" name="correo" placeholder="Correo Electronico" aria-label="Correo Electronico" value="<?php echo $correo; ?>">
                                            </div>
                                            <div class="col">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect01">Grado</label>
                                                    <select class="form-select" name="grado" id="inputGroupSelect01">
                                                        <option selected disabled><?php echo $grado; ?></option>
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
                                                        <option selected disabled><?php echo $turno; ?></option>
                                                        <option value="Diurno">Diurno</option>
                                                        <option value="Tarde">Tarde</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect02">Seccion</label>
                                                    <select class="form-select" name="seccion" id="inputGroupSelect02">
                                                        <option selected disabled><?php echo $seccion; ?></option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" name="id_profesor" value="<?php echo $id; ?>">
                                                <br>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <br>
                                                <button class="btn btn-success" type="submit" name="enviar">Enviar</button>
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
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./assets/SweetAlert/dist/sweetalert2.all.min.js"></script>
    <script src="js/scripts.js"></script>

</body>

</html>