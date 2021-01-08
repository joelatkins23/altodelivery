<!DOCTYPE HTML>
<!DOCTYPE HTML>
<?php require_once('../code/connect.php');
error_reporting(0);

$registro= $_GET['registro'];
$correo= $_GET['correo'];

require_once("../sesion.class.php");
    
    $sesion = new sesion();
    $usuario = $sesion->get("usuario");

     $consulta = mysqli_query($connect, "SELECT * FROM usuarios WHERE correo='$usuario'")
    or die ("Error al traer los datos");

     while ($row = mysqli_fetch_array($consulta)){

        $nombre=$row['nombre'];
        $id=$row['id'];
        $documento=$row['documento'];
        $cedula=$row['cedula'];
        $telefono=$row['telefono'];
        $estado=$row['estado'];
        $ciudad=$row['ciudad'];
        $direccion=$row['direccion'];
        $fecha_registro=$row['fecha_registro'];


     }

?>

<?php
    require_once("../sesion.class.php");
    
    $sesion = new sesion();
    $usuario = $sesion->get("usuario");

     if ($usuario=='') {
       header("Location: ../login.php"); 
    }
?>
<html>
	<head>
		<title>Registro - EnvioAmarillo</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script type="text/javascript" src="../jquery-1.3.2.js"></script>

        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/menu-cuenta.css">


		<!-- Include scripts -->
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script> 
	<script type="text/javascript" src="js/responsivemultimenu.js"></script>

	<!-- Include styles -->
	<link rel="stylesheet" href="css/responsivemultimenu.css" type="text/css"/>

	<!-- Include media queries -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header --> 
				<header id="header">
					<h1><a href="../index.php">EnvioAmarillo.com</a> by DiazStudio</h1>
					<nav id="nav">
						<ul>
							<li><a href="../index.php">Inicio</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Menú</a>
								<ul>
									<li><a href="../generic.html">Inicio</a></li>
									<li><a href="../elements.html">Más Información</a></li>
									<li><a href="../contact.html">Contácto</a></li>
								</ul>
							</li>
							<li><a href="cerrarsesion.php" class="button">Cerrar Sesion</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">


					<header>
						<h2>Bienvenid@, <span style="color:green;"><?php echo $nombre; ?></span>.</h2>
						<h3>Número de Cliente: <span style="color:green;"> EA-<?php echo $id; ?></span>.</h3>
						<p>Comienza a usar nuestro servicio y unete a cientos de empresas de envíos en Venezuela, te asesoramos en todo momento y te ayudaremos a encontrar la empresa ideal, al precio ideal.</p>
						<div id="cuenta">
						

						</div>
					</header>

					<div>
		<div class="rmm style">
			<ul>
				<li>
					<a href="mi-perfil.php">Mi cuenta</a>
					<ul>
						<li>
							<a href="#">Mis Pedidos</a>
						</li>
						<li>
							<a href="mi-perfil.php">Modificar mi información</a>
						</li>
						<li>
							<a href="#">Mis empresas</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Empresas</a>
				</li>
				<li>
					<a href="#">Haz un envío</a>
					<ul>
						<li><a href="#">Registrar envío</a></li>
						<li><a href="#">Calcular envío</a></li>
						<li><a href="#">Comprar en internet</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Atención al cliente</a>
				</li>
			</ul>
		</div>
	</div>


	<section style="margin-top:40px;" class="box special features">
						<div class="features-row">
							<section style="position:relative; width:100%;">
								<h1 style="font-size:24px; color:black; font-weight:bolder;">EMPRESAS REGISTRADAS</SPAN></h1>
								<br>
									<p style="font-size:18px; color:black;">Ház tus compras en <a style="color:blue;" href="">AMAZON</a>, <a style="color:blue;" href="">EBAY</a> y/o cualquier tienda de tu preferencia y te ayudaremos con los pasos para llenar los datos requeridos con la información de la empresa de envíos seleccionada por tí. </p>

									
							</section>

						</div>
						<div class="features-row">
							<section style="border-bottom:1px solid #c0c0c0; height:400px;">
								<img style="width:100px; height:90px; " src="../inexship.png">
								<h1>Reputación</h1>
								<p style="color:green; font-size:30px;">85%</p>
								<p>Locación: <span style="color:red; font-weight:bolder; ">Valencia</span></p>
								 <!-- Change the below data attribute to play -->
<div class="progress-wrap progress" data-progress-percent="85">
  <div class="progress-bar progress"></div>
</div>

        <script src="js/index.js"></script>

								<p>.</p>
							</section>
							<section style="border-bottom:1px solid #c0c0c0; height:400px;">
								<img style="width:100px; height:90px; " src="../v.jpeg">
								<h1>Reputación</h1>
								<p style="color:green; font-size:30px;">77%</p>
								<p>Locación: <span style="color:red; font-weight:bolder; ">Maracaibo</span></p>

								 <!-- Change the below data attribute to play -->
<div class="progress-wrap progress" data-progress-percent="85">
  <div class="progress-bar progress"></div>
</div>
							</section>
							<section style="border-bottom:1px solid #c0c0c0; height:400px;">
								<img style="width:100px; height:90px; " src="../rudy.png">
								<h1>Reputación</h1>
								<p style="color:#CEC79C; font-size:30px;">50%</p>
								<p>Locación: <span style="color:red; font-weight:bolder; ">Maracaibo</span></p>
								 <!-- Change the below data attribute to play -->
<div class="progress-wrap progress" data-progress-percent="85">
  <div class="progress-bar progress"></div>
</div>
							</section>
							<section style="border-bottom:1px solid #c0c0c0; height:400px;">
								<img style="width:100px; height:90px; " src="../liberty.png">
								<h1>Reputación</h1>
								<p style="color:red; font-size:30px;">33%</p>
								<p>Locación: <span style="color:red; font-weight:bolder; ">Caracas</span></p>
								 <!-- Change the below data attribute to play -->
<div class="progress-wrap progress" data-progress-percent="85">
  <div class="progress-bar progress"></div>
</div>
							</section>
						</div>
					</section>

					<div class="row">
						<div class="6u 12u(narrower)">

							<section class="box special">
								<span class="image featured"><img src="../images/pic02.jpg" alt="" /></span>
								<h3>Blog</h3>
								<p>Entra a nuestro blog y podrás discutir sobre cualquier duda que tengas, recomendar empresas y reportar cualquier inconveniente.</p>
								<ul class="actions">
									<li><a href="#" class="button alt">Ir al blog</a></li>
								</ul>
							</section>

						</div>
						<div class="6u 12u(narrower)">

							<section class="box special">
								<span class="image featured"><img src="../images/pic03.jpg" alt="" /></span>
								<h3>Empresas</h3>
								<p>Mira nuestro listado de todas las empresas de Venezuela para que puedas elegir cuidadosamente la adecuada para tí.</p>
								<ul class="actions">
									<li><a href="#" class="button alt">Ver Empresas</a></li>
								</ul>
							</section>

						</div>
					</div>

				</section>
	</section>

					
			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; EnvioAmarillo.com (Todos los derechos reservados) - 2016</li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>


	</body>
</html>