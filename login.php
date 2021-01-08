<!DOCTYPE HTML>
<?php require_once('code/connect.php');
error_reporting(0);
$registro= $_GET['registro'];
$email= $_GET['email'];
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Registro - AltoDelivery</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main-registro.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="jquery-1.3.2.js"></script>
	<script type="text/JavaScript" src="js/sha512.js"></script>
	<script type="text/JavaScript" src="js/forms.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#username').blur(function () {

				$('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

				var username = $(this).val();
				var dataString = 'username=' + username;

				$.ajax({
					type: "POST",
					url: "check_username_availablity.php",
					data: dataString,
					success: function (data) {
						$('#Info').fadeIn(1000).html(data);
						//alert(data);
					}
				});
			});
		});
	</script>
	<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
</head>
<body class="no-sidebar">
	<div id="page-wrapper">
		<!-- Header -->
		<div style="" id="header-wrapper" class="wrapper">
			<center><img id="loguito" style="max-width:400px;" src="images/logo12.png"></center>
			<div id="header">
				<!-- Logo -->
				<div id="logo">
					<center>
						<div style=" margin-top:-20px;">
						</div>
						<div class="inner">
							<?php if ($registro == 'exitoso') { ?>
								<div
									style="background-color:rgba(255,255,255,0.6); border:3px solid black; width:90%; padding:20px; margin-bottom:20px;">
									<h2 style="color:black; text-align:center; font-size:22px;">REGISTRO EXITOSO</h2>
									<h2 style="color:black; text-align:center; font-size:22px;">Te registraste con el
										correo: "<span style="color:#7F413F;">
											<?php echo $email ?>
										</span>".</h2>
									<p style="text-align:center; color:black;">Gracias por registrarte en ALTODELIVERY,
										inicia sesión y termina de llenar tus datos de facturación y envíos para empezar a
										ordenar y pagar desde casa.</p>
								</div>
							<?php } ?>

							<center>
								<h2
									style="color:white; width:60%; margin-top:-80px; font-size:24px; margin-bottom:10px; background-color:#E5756E; ">
									Iniciar Sesión</h2>
							</center>

							<div id="login" class="box">
								<?php
									if (isset($_GET['error'])) {
										echo '<center><p class="error">Datos Incorrectos</p></center>';
									}
								?>
								<div style=" padding:10px; color:white;">
									<form action="includes/process_login.php" method="post" name="login_form">
										<center>Correo</center>
										<center><input <?php if ($registro=='exitoso' ) { ?> value="
											<?php echo $email ?>"
											<?php } ?> style="max-width:500px; text-align:center; color:black;"
											type="text" name="email" />
										</center>
										<center>Contraseña</center>
										<center><input style="max-width:500px; text-align:center; color:black;"
												type="password" name="password" id="password" /></center>
										<br>
										<p style="text-align:center; color:white;"> <a style="color:#E5756E;"
												href="includes/logout.php">He olvidado mi contraseña</a></p>
										<br>
										<center> <input style="color:white;" type="button" value="Login"
												onclick="formhash(this.form, this.form.password);" /> </center>

									</form>
									<br>
									<p style="text-align:center; color:white; margin-top:-40px;">Si aún no te has
										registrado, haz <a style="color:#E5756E;" href="register.php">Click Aquí.</a>
									</p>
								</div>
							</div>
					</center>
				</div>

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
						<li><a href="#">Registrate</a></li>
						<?php if ($iniciada==1){ ?>
						<li>
							<a href="cuenta/index.php">
								<?php echo $email; ?>
							</a>
						</li>
						<?php }else{ ?>
						<li><a id="myBtn3" style="cursor:pointer;">Iniciar Sesión</a></li>
						<?php } ?>

					</ul>
				</nav>
			</div>
		</div>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.dropotron.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/skel-viewport.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>


</body>

</html>