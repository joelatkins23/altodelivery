<!DOCTYPE HTML>
<?php require_once('code/connect.php');
error_reporting(0);

$registro= $_GET['registro'];
$correo= $_GET['correo'];

?>


<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

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
$(document).ready(function() {	
	$('#username').blur(function(){
		
		$('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

		var username = $(this).val();		
		var dataString = 'username='+username;
		
		$.ajax({
            type: "POST",
            url: "check_username_availablity.php",
            data: dataString,
            success: function(data) {
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
				<div id="header-wrapper" class="wrapper">
					<div id="header">

						<!-- Logo -->
							<div id="logo">
								<center><div style=" margin-top:-20px;">
						<img style="width:100%; max-width:500px;" src="images/logo12.png">		
					<div id="main" class="container">

						<!-- Content -->
							<div style="color:white;" id="content">

							<header class="style1">
										<h2 style="color:white;">REGISTRO<br class="mobile-hide" /></h2>
										<p>AltoDelivery te garantiza tús pedidos en menos de 60 minutos, en toda la zona de Alto Barinas.</p>
							</header>

					<?php if ($registro == 'error') { ?>

					<div style="background:white; border:3px solid black; padding:20px; margin-bottom:20px;">
					<h2 style="color:black; text-align:center; font-size:22px;">Error:  "Correo No Disponible."</h2>
					<h2 style="color:black; text-align:center; font-size:22px;">Correo: "<span style="color:red;"><?php echo $correo ?></span>".</h2>
					<p style="text-align:center;">Este correo ya está siendo utilizado, por favor intenta nuevamente el formulario de registro con un correo diferente.<br>
					Si este este es tu correo puedes iniciar sesión en el siguiente enlace: <a style="color:blue;" href="login.php">Iniciar Sesion</a>, y si has olvidado tu contraseña dirigete al botón de "<a style="color:blue;" href="recuperar-contrasena.php">He olvidado mi contraseña</a>".</p></div>

					
				<?php } ?>

				<form method="post" name="registration_form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">

			<input placeholder="Nombre/Apellido" style="display:inline-block; width:80%;  text-align:center; color:black;" autocomplete="off" type="text" name="nombre" id="nombre" value="" placeholder="" /><br><br>
			<input placeholder="Cédula" style="display:inline-block; width:40%; text-align:center; color:black;" type='text' name='username' id='username' />
			<input placeholder="Teléfono" style="display:inline-block; width:40%; text-align:center; color:black;" type='text' name='telefono' id='telefono' /><br><br>
            <input placeholder="Correo" style="width:80%;  text-align:center; color:black;" type="text" name="email" id="email" /><br>
            <input placeholder="Contraseña"  style="display:inline-block; width:40%; text-align:center; color:black;"  type="password" name="password" id="password"/>
            <input placeholder="Verificar Contraseña" style="display:inline-block; width:40%; text-align:center; color:black;" type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" /><br><br>
            <input style="color:white;" type="button" 
                   value="Registrar" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>

					
									</ul>
								</div>
							</div>
					</div>
				</section>
						<p></p>
					</div></center>
								
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
									<li><a href="registro.php">Registrate</a></li>
									<?php if ($iniciada==1){ ?>
							<li><a href="index.php"><?php echo $email; ?></a>
							<ul>
											<li><a href="mis-datos.php">Modificar Mis Datos</a></li>
											<li><a href="../includes/logout.php">Cerrar Sesión</a></li>
										</ul>
										</li>
							<?php }else{ ?>
							<li><a href="#" id="button">Iniciar Sesión</a></li>
							<?php } ?>
									
								</ul>
							</nav>

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
