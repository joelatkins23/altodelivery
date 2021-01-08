<?php
	require_once('conn.php');
	error_reporting(0);


		$i = 0;
		foreach ($_POST['i'] as $val) {
   		 	$ingrediente = $_POST['i'][$i];

			$ingredientes .= $ingrediente.' ';

			$i++;
		} 

			$ingredientes2 = str_replace(" ", ",", $ingredientes);

			$ingredientes3 = substr($ingredientes2, 0, -1); // elimina la ultima coma

			$email= $_POST['email'];
			$img_restaurant= $_POST['img_restaurant'];
			$imagen= $_POST['imagen'];
			$comida= $_POST['comida'];
			$restaurant= $_POST['restaurant'];
			$total= $_POST['precio'];
			$orden= uniqid(TRUE);

	if ($ingredientes3 != '') {

		$consulta3 = mysqli_query($connect, "SELECT * FROM ingredientes WHERE id IN ($ingredientes3) ")

    or die ("Error al traer los datos");

    $total_ingredientes=0;

		while ($extraido3 = mysqli_fetch_array($consulta3)) { 
			$total_ingredientes += $extraido3['precio'];
		}	
		$total= $total+$total_ingredientes;
	}else{}
						
   
		$query1 = mysqli_query($connect, "INSERT INTO orden(email, orden, restaurant, comida, ingredientes, total, carrito, imagen, img_restaurant) 
				VALUES ('$email', '$orden', '$restaurant', '$comida', '$ingredientes3', '$total', 'anadido', '$imagen', '$img_restaurant')");


?>
<script language="javascript">
setTimeout('history.back()')
</script>