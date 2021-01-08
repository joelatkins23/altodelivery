<?php 

	require_once('connect.php');
	date_default_timezone_set('America/La_Paz');
	error_reporting(0);

	$nombre= $_POST['nombre'];
	$clave= $_POST['clave'];
	$correo= $_POST['correo'];
	$cedula= $_POST['cedula'];
	$telefono= $_POST['telefono'];
	$estado= $_POST['estado'];
	$ciudad= $_POST['ciudad'];
	$direccion= $_POST['direccion'];
	$referido= $_POST['referido'];
	$fecha_registro= date('Y-m-d');

	$total = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM usuarios WHERE correo='$correo'"));

	if($total==0){
		$query = mysqli_query($connect, "INSERT INTO usuario(nombre, clave, correo,
				cedula, telefono, estado, ciudad, direccion, referido, fecha_registro) VALUES ('$nombre', '$clave', '$correo'
				, '$cedula', '$telefono', '$estado', '$ciudad', '$direccion', '$referido', '$fecha_registro')");
		header ("Location: ../login.php?registro=exitoso&nombre=$nombre");
	}else{
		header ("Location: ../registro.php?registro=error&correo=$correo");
	}


 ?>