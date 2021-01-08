<?php
error_reporting(0);

$registro= $_GET['registro'];
$correo= $_GET['correo'];

include_once '../includes/db_connect.php';
include_once '../includes/functions.php';

sec_session_start();

             require_once('../code/connect.php');

             $id= $_SESSION['user_id'];

            $consulta = mysqli_query($connect, "SELECT * FROM members WHERE id='$id'")
    or die ("Error al traer los datos");

     while ($row = mysqli_fetch_array($consulta)){

        $email=$row['email'];
        $cedula=$row['username'];


     } 


      $consulta2 = mysqli_query($connect, "SELECT * FROM usuario WHERE email='$email'")
    or die ("Error al traer los datos");

     while ($row = mysqli_fetch_array($consulta2)){

        $nombre=$row['nombre'];
        $id=$row['id'];
        $cedula=$row['cedula'];
        $telefono=$row['telefono'];
        $sector=$row['sector'];
        $avenida=$row['avenida'];
        $calle=$row['calle'];
        $urbanizacion=$row['urbanizacion'];
        $casa=$row['casa'];
        $fecha_registro=$row['fecha_registro'];


     }

     if (login_check($mysqli) == true){$iniciada=1;} 
?>

<html>
	<head>
		<title>Registro - AltoDelivery</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main-registro.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="../jquery-1.3.2.js"></script>
		<script type="text/JavaScript" src="../js/sha512.js"></script> 
        <script type="text/JavaScript" src="../js/forms.js"></script>
		<script type="text/javascript">
$(document).ready(function() {	
	$('#username').blur(function(){
		
		$('#Info').html('<img src="../loader.gif" alt="" />').fadeOut(1000);

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
include_once '../includes/register.inc.php';
include_once '../includes/functions.php';
?>
	</head>
	<body style="background:#E0726C;" class="no-sidebar">
		<div id="page-wrapper">

			<!-- Header -->
				<div style="height:400px;" id="header-wrapper" class="wrapper">
				<center><img id="loguito" style="max-width:400px;" src="../images/logo12.png"></center>
					<div id="header">

						<!-- Logo -->
							<div id="logo">
								<center><div style=" margin-top:-20px;">	
								
							</div>

							
    </center>
   </div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="../index.php">Inicio</a></li>
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
							<li><a href="../cuenta/index.php"><?php echo $email; ?></a></li>
							<?php }else{ ?>
							<li><a id="myBtn3" style="cursor:pointer;">Iniciar Sesión</a></li>
							<?php } ?>
									
								</ul>
							</nav>

					</div>
				</div>

				<br>
<center>

			<div style="position:relative; top:-80px; background:#E0726C; width:300px; color:white; font-weight:bolder; font-size:22px; padding:20px;" class="title"><span style="position:relative; top:-5px;">PEDIDOS</span></div>
				<div style="width:80%; margin-top:0px;" class="inner">


							<h1 style="text-align:center; font-size:28px; color:white;"></h1>
						<br>


					<div style="background:#2E323A; padding:10px; font-size:15px; color:white;">
						

						<div style="display:inline-block; width:10%; text-align:center;"># Orden</div>
						<div style="display:inline-block; width:18%; text-align:center;">Metodo de Pago</div>
						<div style="display:inline-block; width:15%; text-align:center;">Status</div>
						<div style="display:inline-block; width:15%; text-align:center;">Total</div>
						<div style="display:inline-block; width:15%; text-align:center;">Fecha</div>
						<div style="display:inline-block; width:20%; text-align:center;">Opciones</div>

					</div>

														<?php 
						
    $consulta_factura = mysqli_query($connect, "SELECT * FROM factura WHERE email='$email' ORDER BY numero_compra DESC")

    or die ("Error al traer los datos");


    ?>

					<?php while ($extraido_factura = mysqli_fetch_array($consulta_factura)) { ?>

					<style type="text/css">
#backgroundPopup<?php echo $extraido_factura['numero_compra']; ?>{
    display: none;
    position: fixed;
    _position: absolute; /* necesario para internet explorer 6 */
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    background: #ccc;
    border: 1px solid #cecece;
    z-index: 1;
}
#popupContact<?php echo $extraido_factura['numero_compra']; ?>{
    display: none;
    position: fixed;
    _position: fixed; /* necesario para internet explorer 6*/
    width: 80%;
    height: 80%;
    margin-top: 0;
    margin-left: -40%;
    top: 100px;
    left: 50%;
    background: #FFFFFF;
    overflow: auto; /* Enable scroll if needed */
    border: 12px solid #cecece;
    z-index: 2;
    padding: 12px;
    font-size: 13px;
}
.popupContactClose<?php echo $extraido_factura['numero_compra']; ?> {
    font-size: 14px;
    line-height: 14px;
    right: 6px;
    top: 4px;
    position: absolute;
    color: #800000;
    font-weight: 700;
    display: block;
}
#button<?php echo $extraido_factura['numero_compra']; ?>{
    text-align: left;
    font-size: 13px;
    cursor: pointer;
    width: 100px;
    margin: 0 auto;
    margin-top: 10px;
}


#backgroundPopup<?php echo $extraido_factura['numero_compra']; ?>{
    display: none;
    position: fixed;
    _position: absolute; /* necesario para internet explorer 6 */
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    background: #ccc;
    border: 1px solid #cecece;
    z-index: 1;
}
#popupContact<?php echo $extraido_factura['numero_compra']; ?>{
    display: none;
    position: fixed;
    _position: fixed; /* necesario para internet explorer 6*/
    width: 80%;
    height: 80%;
    margin-top: 0;
    margin-left: -40%;
    top: 100px;
    left: 50%;
    background: #FFFFFF;
    border: 12px solid #cecece;
    z-index: 2;
    padding: 12px;
    font-size: 13px;
}
.popupContactClose<?php echo $extraido_factura['numero_compra']; ?> {
    font-size: 30px;
    line-height: 14px;
    right: 6px;
    text-decoration: none;
    top: 4px;
    position: absolute;
    color: #800000;
    font-weight: 700;
    display: block;
}
#button<?php echo $extraido_factura['numero_compra']; ?>{
    text-align: left;
    font-size: 13px;
    cursor: pointer;
    width: 100px;
    margin: 0 auto;
    margin-top: 10px;
}</style>
 
<script type="text/javascript"> 
    var popupStatus<?php echo $extraido_factura['numero_compra']; ?> = 0;
    function loadPopup<?php echo $extraido_factura['numero_compra']; ?>(ventana) {
    if (popupStatus<?php echo $extraido_factura['numero_compra']; ?> == 0) {
        $("#backgroundPopup<?php echo $extraido_factura['numero_compra']; ?>").css({
            "opacity": "0.7"
        });
        $("#backgroundPopup<?php echo $extraido_factura['numero_compra']; ?>").fadeIn("slow");
        $("#popupContact<?php echo $extraido_factura['numero_compra']; ?>").fadeIn("slow");
        popupStatus<?php echo $extraido_factura['numero_compra']; ?> = 1;
    }
};
 
function disablePopup<?php echo $extraido_factura['numero_compra']; ?>() {
    if (popupStatus<?php echo $extraido_factura['numero_compra']; ?> == 1) {
        $("#backgroundPopup<?php echo $extraido_factura['numero_compra']; ?>").fadeOut("slow");
        $("#popupContact<?php echo $extraido_factura['numero_compra']; ?>").fadeOut("slow");
        popupStatus<?php echo $extraido_factura['numero_compra']; ?> = 0;
    }
};
 
$(document).ready(function () {
    $("#button<?php echo $extraido_factura['numero_compra']; ?>").click(function () {
        loadPopup<?php echo $extraido_factura['numero_compra']; ?>(1);
    });
    $(".popupContactClose<?php echo $extraido_factura['numero_compra']; ?>").click(function () {
        disablePopup<?php echo $extraido_factura['numero_compra']; ?>();
    });
    $("#backgroundPopup<?php echo $extraido_factura['numero_compra']; ?>").click(function () {
        disablePopup<?php echo $extraido_factura['numero_compra']; ?>();
    });
    $(document).keypress(function (e) {
        if (e.keyCode == 27 && popupStatus<?php echo $extraido_factura['numero_compra']; ?> == 1) {
            disablePopup<?php echo $extraido_factura['numero_compra']; ?>();
        }
    });
});
</script>

<div id="popupContact<?php echo $extraido_factura['numero_compra']; ?>">
    <a class="popupContactClose<?php echo $extraido_factura['numero_compra']; ?>">x</a>

    <center> <p style="color:black;"> <?php echo $extraido_factura['numero_compra']; ?> </p></center>


</div>

<div id="backgroundPopup<?php echo $extraido_factura['numero_compra']; ?>"></div>


												

					<div style="background:white; padding:10px; font-size:16px;  border-bottom:2px solid black; border-style:dashed;">
						<div style="display:inline-block; width:10%; text-align:center;color:black; font-size:26px; font-weight:bolder;">
						<?php echo $extraido_factura['numero_compra']; ?>
						</div>

						<div style="display:inline-block; width:18%; text-align:center;color:black;"><?php echo $extraido_factura['metodo_pago']; ?></div>
						<div style="display:inline-block; width:15%; text-align:center;color:black; font-size:13px;"><?php echo $extraido_factura['status']; ?> <?php if ($extraido_factura['status']=='Pendiente'){ ?>
						<center><a style="text-align:center; text-decoration:none;" href="#" id="button<?php echo $extraido_factura['numero_compra']; ?>"><div style="cursor:pointer; background-color:red; color:white; width:80px; ">Enviar Pago</div></a></center>
							
						<?php } ?></div>
						<div style="display:inline-block; width:15%; text-align:center;color:black; font-weight:bolder;"><?php echo $extraido_factura['total']; ?> Bs</div>
						<div style="display:inline-block; width:15%; text-align:center;color:black;"><?php echo $extraido_factura['fecha']; ?></div>

						 <script type="text/javascript">
function mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>(){
	$("#uno_factura<?php echo $extraido_factura['numero_compra']; ?>").fadeIn();
	document.getElementById('ocultar_factura<?php echo $extraido_factura['numero_compra']; ?>').style.display='block';
	document.getElementById('ocultar_factura<?php echo $extraido_factura['numero_compra']; ?>').style.marginLeft='0px';
	document.getElementById('mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>').style.display='none';


}
function ocultar_factura<?php echo $extraido_factura['numero_compra']; ?>(){
	$("#uno_factura<?php echo $extraido_factura['numero_compra']; ?>").fadeOut();
	document.getElementById('ocultar_factura<?php echo $extraido_factura['numero_compra']; ?>').style.display='none';
	document.getElementById('mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>').style.display='block';
	document.getElementById('mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>').style.marginLeft='0px';


}
</script>

<div style="display:inline-block; width:20%; text-align:center;color:black;">

<center><a name="mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>" type="button" value="mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>" onClick="mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>();">
        <div id="mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>" style="display:inline-block; text-decoration:none; margin-top:1px; cursor:pointer; font-size:12px; background:#FF4F4F; width:60px;  color:white;">Detalles</div></a></center>

        <center><a name="ocultar_factura<?php echo $extraido_factura['numero_compra']; ?>" type="button" value="mostrar_factura<?php echo $extraido_factura['numero_compra']; ?>" onClick="ocultar_factura<?php echo $extraido_factura['numero_compra']; ?>();">
        <div id="ocultar_factura<?php echo $extraido_factura['numero_compra']; ?>" style="display:none; text-decoration:none; margin-top:1px; cursor:pointer; font-size:12px; background:#FF4F4F; width:60px;  margin-left:-20px; color:white;">Ocultar</div></a></center>
</div>
						
					</div>
<div id="uno_factura<?php echo $extraido_factura['numero_compra']; ?>" style="display:none;">


<?php $ordenes = $extraido_factura['ordenes']; 

$consulta_orden = mysqli_query($connect, "SELECT * FROM orden WHERE id IN ($ordenes) ")

    or die ("Error al traer los datos");



?>



													<div style="background:#B75C58; padding:10px; color:white; font-weight:bolder; text-align:center;">
													<div style="background:red; padding:3px; color:white; font-weight:bolder; text-align:center;">Esperando recibo de pago</div>
													
														<div style="display:inline-block; width:20%; position:relative;">Restaurante</div>
														<div style="display:inline-block; width:20%; position:relative;">Comida</div>
														<div style="display:inline-block; width:20%; position:relative;">Precio</div>
													</div>

													<?php while ($extraido_orden = mysqli_fetch_array($consulta_orden)) { ?>
														
													<div style="background-color:rgba(255,255,255,0.9); padding:15px; font-size:14px; border-bottom:4px solid black; ">

													


														<div style="display:inline-block; width:20%; text-align:center; color:black;"><img style="width:80px; position:relative; top:0px;" src="../images/<?php echo $extraido_orden['imagen']; ?>"> </div>
														<div style="display:inline-block; width:20%; text-align:center; color:black;"><img style="width:40px; position:relative; top:0px;" src="../<?php echo $extraido_orden['img_restaurant']; ?>"><br>
														<span style="position:relative; top:0px;"> <?php echo $extraido_orden['restaurant']; ?> </span></div>
														<div style="display:inline-block; width:20%; text-align:center; color:black;"><?php echo $extraido_orden['comida']; ?></div>

														<div style="display:inline-block; width:20%; text-align:center; color:black;"><?php echo $extraido_orden['total']; ?> Bs</div>



													</div>


													<?php } ?> 
</div>


					<?php } ?> 





<br><br>

							       
							</div>
							</center>


					



		<!-- Scripts -->

			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/skel-viewport.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>


	</body>
</html>
