<!DOCTYPE HTML>
<?php
error_reporting(0);

$registro= $_GET['registro'];
$correo= $_GET['correo'];

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

require_once('code/connect.php');

$id= $_SESSION['user_id'];

$consulta = mysqli_query($connect, "SELECT * FROM members WHERE id='$id'")
    or die ("Error al traer los datos");

     while ($row = mysqli_fetch_array($consulta)){

        $email=$row['email'];


     } 

     if (login_check($mysqli) == true) {
     	$iniciada=1;
     }

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'Conectado';
} else {
    $logged = 'Desconectado';
}
?>
<html>

<head>
	<title>AltoDelivery</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<script type="text/JavaScript" src="js/sha512.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
	<script type="text/JavaScript" src="js/forms.js"></script>
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<style type="text/css">
		#backgroundPopup {
			display: none;
			position: fixed;
			_position: absolute;
			/* necesario para internet explorer 6 */
			height: 100%;
			width: 100%;
			top: 0;
			left: 0;
			background: url("images/banner.jpg");
			border: 1px solid #cecece;
			z-index: 1;
		}

		#popupContact {
			display: none;
			position: fixed;
			_position: fixed;
			/* necesario para internet explorer 6*/
			width: 80%;
			height: 80%;
			margin-top: 0;
			margin-left: -40%;
			top: 100px;
			left: 50%;
			background: url("images/banner.jpg");
			overflow: auto;
			/* Enable scroll if needed */
			border: 12px solid #cecece;
			z-index: 2;
			padding: 12px;
			font-size: 13px;
		}

		.popupContactClose {
			font-size: 14px;
			line-height: 14px;
			right: 6px;
			top: 4px;
			position: absolute;
			color: #800000;
			font-weight: 700;
			display: block;
		}

		#button2 {
			text-align: left;
			font-size: 13px;
			cursor: pointer;
			width: 100px;
			margin: 0 auto;
			margin-top: 10px;
		}


		#backgroundPopup {
			display: none;
			position: fixed;
			_position: absolute;
			/* necesario para internet explorer 6 */
			height: 100%;
			width: 100%;
			top: 0;
			left: 0;
			background: #ccc;
			border: 1px solid #cecece;
			z-index: 1;
		}

		#popupContact {
			display: none;
			position: fixed;
			_position: fixed;
			/* necesario para internet explorer 6*/
			width: 80%;
			height: 80%;
			margin-top: 0;
			margin-left: -40%;
			top: 100px;
			left: 50%;
			background: url("images/banner.jpg");
			border: 12px solid #cecece;
			z-index: 2;
			padding: 12px;
			font-size: 13px;
		}

		.popupContactClose {
			font-size: 30px;
			text-decoration: none;
			line-height: 14px;
			right: 18px;
			cursor: pointer;
			top: 14px;
			position: absolute;
			color: black;
			font-weight: 700;
			display: block;
		}

		#button2 {
			text-align: left;
			font-size: 13px;
			cursor: pointer;
			width: 100px;
			margin: 0 auto;
			margin-top: 10px;
		}
	</style>

	<script type="text/javascript">
		var popupStatus = 0;
		function loadPopup(ventana) {
			if (popupStatus == 0) {
				$("#backgroundPopup").css({
					"opacity": "0.7"
				});
				$("#backgroundPopup").fadeIn("slow");
				$("#popupContact").fadeIn("slow");
				popupStatus = 1;
			}
		};

		function disablePopup() {
			if (popupStatus == 1) {
				$("#backgroundPopup").fadeOut("slow");
				$("#popupContact").fadeOut("slow");
				popupStatus = 0;
			}
		};

		$(document).ready(function () {
			$("#button").click(function () {
				loadPopup(1);
			});
			$(".popupContactClose").click(function () {
				disablePopup();
			});
			$("#backgroundPopup").click(function () {
				disablePopup();
			});
			$(document).keypress(function (e) {
				if (e.keyCode == 27 && popupStatus == 1) {
					disablePopup();
				}
			});
		});
	</script>
</head>

<body class="homepage">
	<div id="page-wrapper">
		<!-- Header -->
		<div id="header-wrapper" class="wrapper">
			<img id="loguito" src="images/logo12.png">
			<div id="header">
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="current"><a href="index.php">Inicio</a></li>
						<li>
							<a href="#">¿Como Funciona?</a>
							<ul>
								<li><a href="#">Aprende a ordenar</a></li>
								<li><a href="#">¿Tienes un restaurante?</a></li>
								<li><a href="#">Preguntas Frecuentes</a></li>
							</ul>
						</li>
						<li><a href="#">Restaurantes</a></li>
						<?php if ($iniciada==1){ ?>
						<?php }else{ ?>
						<li><a href="registro.php">Registrate</a></li>
						<?php } ?>

						<?php if ($iniciada==1){ ?>
						<li><a href="cuenta/index.php">
								<?php echo $email; ?>
							</a>
							<ul>
								<li><a href="cuenta/mis-datos.php">Modificar Mis Datos</a></li>
								<li><a href="includes/logout.php">Cerrar Sesión</a></li>
							</ul>
						</li>
						<?php }else{ ?>
						<li><a href="login.php">Iniciar Sesión</a></li>
						<?php } ?>

					</ul>
				</nav>

				<?php if ($iniciada==1){ ?>

				<center>
					<div id="banner-registro">
						<h1 style="font-size:40px; line-height: 100%; color:#F7DC93;">PIDE TU COMIDA FAVORITA EN ALTO
							BARINAS</h1>
						<br>
						<h1 style="font-size:30px; line-height: 100%; color:white;">Actualmente están disponibles (12)
							restaurantes en la zona de Alto Barinas.</h1>
						<center>
							<ul class="actions" style="margin-top:20px;">
								<li><a href="#restaurantes" class="button style3 big"
										style="background-color:#0D6F99;">Ver Restaurantes</a></li>
							</ul>
							<?php }else{ ?>
							<center>
								<div id="banner-registro">
									<h1 style="font-size:40px; line-height: 100%; color:#F7DC93;">PIDE TU COMIDA
										FAVORITA EN ALTO BARINAS</h1>
									<br>
									<h1 style="font-size:30px; line-height: 100%; color:white;">¿Deseas ordenar tu
										comida favorita sin moverte de casa? <br>
										Estás a medio paso de hacerlo.</h1>
									<center>
										<div
											style="display:inline-block; width:40%;  padding:10px; border-right:4px solid rgba(255,255,255,0.1);">
											<br>
											<ul class="actions" style="margin-top:-20px;">
												<li><a href="registro.php" class="button style3 big"
														style="background-color:#0D6E61;">Regístrate</a></li>
											</ul>
										</div>
										<div style="display:inline-block; width:40%; padding:10px; ">
											<br>
											<ul class="actions" style="margin-top:-0px;">
												<li><a href="#" class="button style3 big" id="button"
														style="background-color:#0D6F99;">Iniciar Sesion</a></li>
											</ul>
										</div>
									</center>
									<?php } ?>
								</div>
							</center>
					</div>
			</div>
			<div id="popupContact">
				<a class="popupContactClose">x</a>
				<div class="modal-body3">
					<center>
						<div class="inner">
							<center>
								<h2 style="color:white; margin-top:0px; font-size:24px; margin-bottom:10px; background-color:#E5756E; ">Iniciar Sesión</h2>
							</center>

							<div style="border-top:2px solid black;" class="box">
								<?php
									if (isset($_GET['error'])) {
										echo '<center><p class="error">Datos Incorrectos</p></center>';
									}
									?>
								<div
									style="background-color: rgba(255, 255, 255, 0.4); padding:10px; color:white; font-size:20px;">
									<form action="includes/process_login.php" method="post" name="login_form">
										<center>Correo</center>
										<center><input style="max-width:500px; margin-top:10px; margin-bottom:10px;"
												type="text" name="email" /></center>
										<center>Contraseña</center>
										<center><input style="max-width:500px; margin-top:10px;" type="password"
												name="password" id="password" /></center>
										<br>
										<p style="text-align:center;"> <a href="#" style="color:yellow;">He olvidado mi
												contraseña</a></p>
										<br>
										<center> <input type="button" style="color:white;" value="Login"
												onclick="formhash(this.form, this.form.password);" /> </center>

									</form>

									<br>
									<p style="text-align:center;">Si aún no te has registrado, haz <a
											href="registro.php" style="color:yellow;">Click Aquí.</a></p>
								</div>

					</center>
				</div>
			</div>

			<div id="backgroundPopup"></div>


			<!-- Intro -->
			<div id="intro-wrapper" class="wrapper style1">
				<div class="title">¿Cómo Funciona?</div>
				<section id="intro" class="container">
					<p class="style1">Es muy fácil, comienza por registrarte en el siguiente botón:</p>
					<ul class="actions">
						<li><a href="registro.php" class="button style3 big">Registrate</a></li>
					</ul>
					<br>
					<p class="style1">Y sigue los pasos, es así de sencillo.</p>

					<p class="style2">
						<img style="max-width:1000px; width:100%;" src="images/pasos.png"></a>
					</p>

				</section>
			</div>


			<!-- Highlights -->
			<div class="wrapper style3">
				<div id="restaurantes" class="title">Restaurantes</div>
				<div id="highlights" class="container">

					<div class="row 150%">
						<?php 						
							$consulta2 = mysqli_query($connect, "SELECT * FROM restaurantes ORDER BY id")
								or die ("Error al traer los datos");
							?>
						<?php while ($extraido2 = mysqli_fetch_array($consulta2)) { ?>

						<div class="lista-restaurantes">
							<section class="highlight">
								<a href="<?php echo $extraido2['link']; ?>">
									<img class="img-lista" src="<?php echo $extraido2['imagen']; ?>" alt="" />
								</a>
								<ul id="" class="actions boton-ordenar">
									<li>
										<a href="<?php echo $extraido2['link']; ?>" class="button style1">Ordenar</a>
									</li>
								</ul>
								<h3>
									<a href="#">
										<?php echo $extraido2['restaurant']; ?>
									</a><br>
									Status: <span style="color:green; font-weight:bolder;">Abierto (Disponible entre 10	am / 8 pm)</span>.
								</h3>

								<div class="informacion">
									<p style="">
										<?php echo $extraido2['informacion']; ?>
									</p>
								</div>

							</section>
						</div>

						<?php } ?>


					</div>
				</div>
			</div>

			<!-- Footer -->
			<div id="footer-wrapper" class="wrapper">
				<div class="title">Contáctanos</div>
				<div id="footer" class="container">
					<header class="style1" style="position:relative; top:50px;">
						<h2>¿Tienes alguna pregunta que hacernos?</h2>
						<p>
							A través del siguiente formulario podrás contactarte con nosotros y te responderemos en
							máximo 24 horas.
						</p>
					</header>

					<center><img style="max-width:200px; position:relative; top:100px;" src="images/logo12.png">
					</center>
					<hr />
					<div class="row 150%">
						<div class="6u 12u(mobile)">

							<!-- Contact Form -->
							<section>

								<form method="post" action="#">
									<div class="row 50%">
										<div class="6u 12u(mobile)">
											<input type="text" name="name" id="contact-name" placeholder="Nombre" />
										</div>
										<div class="6u 12u(mobile)">
											<input type="text" name="email" id="contact-email" placeholder="Correo" />
										</div>
									</div>
									<div class="row 50%">
										<div class="12u">
											<textarea name="message" id="contact-message" placeholder="Mensaje"
												rows="4"></textarea>
										</div>
									</div>
									<div class="row">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" class="style1" value="Enviar" /></li>
												<li><input type="reset" class="style2" value="Resetear" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>

						</div>
						<div class="6u 12u(mobile)">

							<!-- Contact -->
							<section class="feature-list small">
								<div class="row">
									<div class="6u 12u(mobile)">
										<section>
											<h3 class="icon fa-home">Dirección</h3>
											<p>
												Urb. Jardines de Alto Barinas<br />
												Conj. Karuachi<br />
												Barinas, Venezuela.
											</p>
										</section>
									</div>
									<div class="6u 12u(mobile)">
										<section>
											<h3 class="icon fa-comment">Social</h3>
											<p>
												<a href="#">@AltoDelivery</a><br />
												<a href="#">instagram.com/AltoDelivery</a><br />
												<a href="#">facebook.com/AltoDelivery</a>
											</p>
										</section>
									</div>
								</div>
								<div class="row">
									<div class="6u 12u(mobile)">
										<section>
											<h3 class="icon fa-envelope">Email</h3>
											<p>
												<a href="#">info@AltoDelivery.com.ve</a>
											</p>
										</section>
									</div>
									<div class="6u 12u(mobile)">
										<section>
											<h3 class="icon fa-phone">Telefono</h3>
											<p>
												(414) 514-2165
											</p>
										</section>
									</div>
								</div>
							</section>

						</div>
					</div>
					<hr />
				</div>
				<div id="copyright">
					<ul>
						<li>&copy; AltoDelivery.com.ve</li>
						<li>Diseño: <a href="#">Ronald Díaz</a></li>
					</ul>
				</div>
			</div>

		</div>

		<!-- Scripts -->

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.dropotron.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/skel-viewport.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>

</body>

</html>