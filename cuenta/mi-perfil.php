<!DOCTYPE HTML>
<!DOCTYPE HTML>
<?php require_once('../code/connect.php');
error_reporting(0);
session_start ();
$registro= $_GET['registro'];
$correo= $_GET['correo'];

require_once("../sesion.class.php");
    
	$sesion = new sesion();
	
	echo  $_SESSION['usuario'];

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
							<a href="#">Modificar mi información</a>
						</li>
						<li>
							<a href="#">Mis empresas</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="ver-empresas.php">Empresas</a>
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
							<section style="position:relative; width:100%; padding:3em;">
								<h1 style="font-size:26px; color:black; font-weight:bolder; text-decoration:underline;">DATOS DEL CLIENTE</h1>
								<br>
									<p style="font-size:18px; color:black;">
									"Manten tús datos actualizados para que no existan inconvenientes a la hora de realizar un pedido con tu empresa favorita". </p>

							</section>

							<section style="background: #c0c0c0; position:relative; width:100%; padding:3em;">

								<h1 style="font-size:30px; color:black; border-bottom:1px solid black;">Información Personal</h1>
								<br>
									
									<div>
										<p style="color:black; position:relative; top:20px;">Nombre/Apellido ó Empresa </p>
										<center><input style="text-align:center; width:85%; color:black;" type="text" value="<?php echo $nombre; ?>"></center>
									</div>

									<div>
										<p style="color:black; position:relative; top:20px;">Documento de Identidad </p>
										<input autocomplete="off" type="text" readonly style="width:15%; text-align:center; display:inline-block; color:black;" name="documento" id="documento" value="<?php echo $documento; ?>" placeholder="V" /> 
									<input autocomplete="off"  readonly type="text" style="width:75%;text-align:center;  display:inline-block; color:black;" name="cedula" id="cedula" value="<?php echo $cedula; ?>" placeholder="Cedula" />
									</div>

									<div>
										<p style="color:black; position:relative; top:20px;">Telefono </p>
										<center><input style="text-align:center; width:85%; color:black;" type="text" value="<?php echo $telefono; ?>"></center>
										<br>
									</div>

									<input style="margin-bottom:10px;" value="Guardar Cambios" type="submit" />
									
							</section>

						</div>


						<div class="features-row">
							<section style="background: #c0c0c0; width:100%; padding:3em;">
								
								<h1 style="font-size:30px; color:black; border-bottom:1px solid black;">Dirección de Domicilio</h1>

									<div>
										<p style="color:black; position:relative; top:20px;">País </p>
										<center><input style="text-align:center; width:85%; color:black;" type="text" value="Venezuela"></center>
									</div>

									<div>
										<p style="color:black; position:relative; top:20px;">Estado </p>
										<center><input style="text-align:center; width:85%; color:black;" type="text" value="<?php echo $estado; ?>"></center>
									</div>

									<div>
										<p style="color:black; position:relative; top:20px;">Ciudad </p>
										
									<input autocomplete="off"  readonly type="text" style="width:85%;text-align:center;  display:inline-block; color:black;" name="cedula" id="cedula" value="<?php echo $ciudad; ?>" placeholder="Cedula" />
									</div>

									<div>
										<p style="color:black; position:relative; top:20px;">Dirección </p>
										<center> <textarea style="resize:none; width:85%; color:black; text-align:center;"><?php echo $direccion; ?></textarea> </center>
										<br>
									</div>
									<input style="margin-bottom:10px;" value="Guardar Cambios" type="submit" />
									

							</section>

						</div>
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