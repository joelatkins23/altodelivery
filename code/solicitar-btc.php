<?php 

	require_once('connect.php');
	date_default_timezone_set('America/La_Paz');
	error_reporting(0);

	$id= $_POST['id'];
	$numero_compra= $_POST['numero_compra'];
	$direccion_btc= $_POST['direccion_btc'];
	$nombre= $_POST['nombre'];
	$correo= $_POST['correo'];
	$telefono= $_POST['telefono'];
	$cantidad_btc= $_POST['cantidad_btc'];
	$fecha_pedido= date('Y-m-d');

	 $consulta_tasa = mysqli_query($connect, "SELECT * FROM tasa WHERE cambio_moneda='COMPRA BITCOINS' ")
		or die ("Error al traer los datos");

		while ($rowExiste = mysqli_fetch_array($consulta_tasa)){

			$precio = $rowExiste['precio'];
		}

		$monto_pagar= $cantidad_btc*$precio;

		$query = mysqli_query($connect, "INSERT INTO compras(numero_compra, direccion_btc, nombre, correo,
				telefono, cantidad_btc, precio, monto_pagar, fecha_pedido) VALUES ('$numero_compra', '$direccion_btc', '$nombre', '$correo'
				, '$telefono', '$cantidad_btc', '$precio', '$monto_pagar', '$fecha_pedido')");

		header ("Location: ../orden-recibida.php?orden=".$numero_compra);

 ?>