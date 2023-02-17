<?php
require "conexion.php";
session_start();
if ($_POST) {
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	$sql = "SELECT id, password, usuario, tipo_usuario FROM usuarios WHERE usuario='$usuario' ";
	$resultado = $mysqli->query($sql);

	$num = $resultado->num_rows;

	if ($num > 0) {
		$row = $resultado->fetch_assoc();
		$password_bd = $row['password'];
		$pass_c = sha1($password);
		if ($password_bd == $pass_c) {
			$_SESSION['id'] = $row['id'];
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['tipo_usuario'] = $row['tipo_usuario'];

			header("Location: principal.php");
		} else {
			echo "<script>
			alert('la contraseña no coincide');
			location.assing('iniciarsesion.php');
		</script>";
		}
	} else {
		echo "<script>
        alert('El usuario no coincide');
        location.assing('iniciarsesion.php');
    </script>";
	}
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>U.E.N Dr Manuel Díaz Rodriguez</title>
	<!-- FAVICON -->
	<link rel="icon" href="assets/img/logoEscuela.png">
	<!-- STYLESHEETS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/alert.css">
	<link rel="stylesheet" href="assets/SweetAlert/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/principal.css">
	<link rel="stylesheet" type="text/css" href="css/accordian.css">
	<link rel="stylesheet" href="css/owl/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl/owl.theme.default.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></>
	<script src="js/smoothscroll.js"></script>
	<script>
		$("#navbarNav").on("click", "a", function() {
			$(".navbar-toggle").click();
			//or $("#nav").slideToggle();
		});
	</script>
</head>
<script type="text/javascript">
	(function(i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function() {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-96875843-3', 'auto');
	ga('send', 'pageview');
</script>

<body>

	<div class="signupFrm">
		<?php
		if (isset($_GET['err']) && is_numeric($_GET['err']) && $_GET['err'] > 0 && $_GET['err'] < 3)


			echo '	<div class="alert alert-danger d-flex align-items-start" role="alert">
    					<div>'
				. $messages[$_GET['err']] .
				' 		</div>
					</div>';

		?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="form">
			<h1 class="title">Iniciar Session</h1>
			<div class="inputContainer">
				<input type="text" name="usuario" id="inputEmail" class="input" placeholder="a">
				<label for="" class="label">Usuario</label>
			</div>

			<div class="inputContainer">
				<input type="password" name="password" id="inputPassword" class="input" placeholder="a">
				<label for="" class="label">Contraseña</label>
			</div>
			<div class="button">
				<input type="submit" class="submitBtn" value="Ingresar">
			</div>
		</form>


	</div>


	<!-- FOOTER SCRIPTS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="js\owl\owl.carousel.js"></script>
	<script src="js\accordian.js"></script>
	<!-- Header scroll -->
	<script type="text/javascript">
		$(window).scroll(function() {
			if ($(this).scrollTop() > 20) {
				$('#navbar').addClass('header-scrolled');
			} else {
				$('#navbar').removeClass('header-scrolled');
			}
		});
	</script>
	<script>
		$(document).ready(function() {
			$(".owl-carousel").owlCarousel({
				items: 4,
				loop: true,
				nav: true,
				autoplay: true,
				autoplayTimeout: 2000,
				autoplayHoverPause: true,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1
					},
					600: {
						items: 3
					},
					1000: {
						items: 4
					}
				}
			});
		});
	</script>
	<script src="app.js"></script>
	<script src="./assets/SweetAlert/dist/sweetalert2.all.min.js"></script>
</body>

</html>