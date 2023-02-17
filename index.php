<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<!-- META DATA -->
	<title>U.E.N Dr Manuel Díaz Rodriguez</title>
	<meta name="description" content="Codelander is a multi-purpose HTML landing page template by Codefest. Purchase now.">
	<meta name="keywords" content="Codelander,Codefest">
	<meta name="author" content="Codefest">
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<!-- FAVICON -->
	<link rel="icon" href="assets/img/logoEscuela.png">
	<!-- STYLESHEETS -->
	<link rel="stylesheet" href="css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css\principal.css">
	<link rel="stylesheet" type="text/css" href="css\accordian.css">
	<link rel="stylesheet" href="css\owl\owl.carousel.min.css">
	<link rel="stylesheet" href="css\owl\owl.theme.default.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js\smoothscroll.js"></script>
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
	<!-- NAVBAR -->
	<nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-header navbar-mobile">
		<div class="navbar-container container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-around" id="navbarNav">
				<ul class="navbar-nav menu-navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="#top">
							<p class="nav-link-menu">Inicio</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#services">
							<p class="nav-link-menu">Institución</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#contact">
							<p class="nav-link-menu">Contacto</p>
						</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link learn-more-btn" href="iniciarsesion.php">Iniciar Session</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- SECTION LABEL -->
	<div id="top"></div>
	<!-- WRAPPER -->
	<div class="wrapper">
		<div class="header">
			<div class="container header-container">
				<div class="col-lg-6 header-img-section">
					<img src="assets\img\education.png">
				</div>
				<div class="col-lg-5 offset-lg-1 header-title-section">
					<p class="header-subtitle">Escuela Básica Nacional</p>
					<h1 class="header-title">Dr Manuel Díaz Rodriguez</h1>
					<p class="header-title-text">Es una organización educativa de carácter público, ubicada en la comunidad “El León”, Municipio Libertador Distrito Capital; la cual atiende a alumnos y alumnas desde el nivel de Educación Inicial, I y II Etapa de Educación Básica, con el objeto de satisfacer las necesidades académicas desarrollando el potencial creativo, participativo, solidario y responsable.</p>
				</div>
			</div>
		</div>
		<!-- SECTION LABEL -->
		<div id="services"></div>

		<!-- SERVICES -->
		<div class="services-section">
			<div class="services-section-bg-graphics">
				<img src="assets\img\services-section-bg.png">
			</div>
			<div class="container services-container">
				<div class="col-lg-5 services-title-section">
					<p class="services-subtitle">Nuestra institución</p>
					<h2 class="services-title">Nuestros Objetivos</h2>
					<div class="services-accordion">
						<button class="accordion">
							Visión
						</button>
						<div class="panel">
							<p>
								Ser una institución de reconocido prestigio en la comunidad en general, con un alto sentido de compromiso y responsabilidad en la formación integral de los educandos, orientada a fortalecer los valores sociales, culturales y personales, generando la participación activa, solidaria y ética en la localidad, como instrumento de transformación humanista.
							</p>
						</div>
						<button class="accordion">
							Objetivos
						</button>
						<div class="panel">
							<p>
							<ul>
								<li>·Lograr una buena educación complementaria a nivel de básica y preescolar.</li>
								<li>·Enseñar de una forma dinámica, práctica e informativa a todos nuestros alumnos.</li>
								<li>·Lograr el mayor desempeño en todos nuestros estudiantes y lograr ser una escuela de reconocimiento.</li>
							</ul>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 offset-lg-1 services-header-img-section">
					<img src="assets\img\services-header.png">
				</div>
			</div>
		</div>
		<!-- SECTION LABEL -->
		<div id="clients"></div>
		<!-- CLIENTS -->
		<div class="clients-section">
			<div class="container clients-container">
				<div class="clients-title-section">
					<h2 class="clients-title">Instituciones</h2>
				</div>
				<div class="clients-slider">
					<div class="owl-carousel owl-theme clients-slider-section">
						<div class="item client-logo-section">
							<img src="assets\img\logoEscuela.png">
						</div>
						<div class="item client-logo-section">
							<img src="assets\img\MinisterioDeEducacion.png">
						</div>
					</div>
				</div>
			</div>
		</div>s
		<!-- SECTION LABEL -->
		<div id="contact"></div>
		<!-- CONTACT -->
		<div class="contact-section">
			<div class="container contact-container">
				<div class="col-md-6 contact-title-section">
					<p class="contact-subtitle">Contacto</p>
					<h2 class="contact-title">Alguna Duda?<br>Escribenos</h2>
					<div class="learn-more-btn-section">
						<a class="nav-link learn-more-btn btn-invert" href="mailto:name@domain.com">Enviar</a>
					</div>
				</div>
				<div class="col-md-6 contact-header-img">
					<img src="assets/img/contact1.png">
				</div>
			</div>
		</div>
		<!-- FOOTER -->
		<div class="footer-section">
			<div class="footer-section-bg-graphics">
				<img src="assets\img\footer-section-bg.png">
			</div>
			<!-- Footer Column 1 -->
			<div class="container footer-container">
				<div class="col-lg-3 col-md-6 footer-logo">
					<img src="assets\img/logoEscuela.png">
					<p class="footer-susection-text">U.E.N Dr. Manuel Díaz Rodriguez</p>
				</div>
				<div class="col-lg-3 col-md-6 footer-subsection">
					<div class="footer-subsection-2-1">
						<h3 class="footer-subsection-title">Sobre Nosotros</h3>
						<p class="footer-subsection-text">Institución enfocada en la educación de nuestros niños, niñas y adolecentes.</p>
					</div>
				</div>
				<!-- Footer Column 2 -->
				<div class="col-lg-3 col-md-6 footer-subsection">
					<h3 class="footer-subsection-title">Contacto</h3>
					<ul class="footer-subsection-list">
						<li>Parroquia Santa <br> Rosalía- Caracas</li>
						<li>0123456789</li>
						<li>dr.manuel.diaz.rodriguez.ins@gmail.com</li>
					</ul>
				</div>
				<!-- Footer Column 3 -->
				<div class="col-lg-3 col-md-6 footer-subsection">
					<div class="footer-subsection-2-2">
						<h3 class="footer-subsection-title">Social</h3>
						<div class="footer-social-media-icons-section">
							<a href="#top" class="footer-social-media-icon"><i class="fa fa-twitter"></i></a>
							<a href="#top" class="footer-social-media-icon"><i class="fa fa-facebook"></i></a>
						</div>
					</div>
				</div>
			</div>
			<!-- FOOTER CREDITS -->
			<div class="container footer-credits">
				<p>&copy; 2022 <a href="https://sistemadegestionestudiantil.blogspot.com/" target="_blank" title="Codefest">Developer Group</a>&trade;. Enfocados en tu crecimiento técnologico.</p>
			</div>
		</div>
	</div>

	<!-- FOOTER SCRIPTS -->
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
</body>

</html>