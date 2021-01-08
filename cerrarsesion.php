<?php
	require_once("sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");	
	if( $usuario == false )
	{	
		header("Location: login.php");
	}
	else 
	{
		$usuario = $sesion->get("usuario");	
		$sesion->termina_sesion();
		$host="localhost";
		$user="root";
		$pass="";
		$db="altodelivery";

		$connect = new mysqli($host,$user,$pass,$db) or die("error" . mysqli_errno($connect));
			$modifica = "UPDATE usuario SET sesion='0' WHERE correo='$usuario'";

			$resultado = mysqli_query($connect, $modifica)
		or die ("Error al insertar los registros");
		header("location: index.php");
	}
?>