<?php
	require_once('../conn.php');
	error_reporting(0);

	$id_comida= $_POST['id_comida'];
	$comidas= $_POST['comidas'];
	$email= $_POST['email'];
	$total= $_POST['total'];
	$metodo_pago= $_POST['metodo_pago'];
	$orden= uniqid(TRUE);

	date_default_timezone_set('America/La_Paz');
        // Then call the date functions
    $date = date('Y-m-d H:i:s');
    // Or
    $date = date('Y/m/d H:i:s');

	for ($i=0; $i < $comidas; $i++) { 
		$explode = explode(" ", $id_comida);		
	}
	$explosion= '';
	for ($i=0; $i < $comidas; $i++) { 
		$explosion .= $explode[$i].',';
	}
	$explosion = substr($explosion, 0, -1); // elimina la ultima coma
?>

<?php 						
    $consultacarrito3 = mysqli_query($connect, "SELECT * FROM orden WHERE email='$email' AND carrito='anadido' ")
	or die ("Error al traer los datos");
	$consulta = mysqli_query($connect, "SELECT * FROM factura ORDER BY id DESC LIMIT 1")
    or die ("Error al traer los datos");
	    $numero_compra=1;
    while ($extraido = mysqli_fetch_array($consulta)) {
        $numero_compra = $extraido['numero_compra'] + 1;
    }			
   	$consultacarrito = mysqli_query($connect, "UPDATE orden SET carrito='pendiente' WHERE id IN ($explosion) ") or die ("Error al traer los datos");

   	$query1 = mysqli_query($connect, "INSERT INTO factura(numero_compra, orden, ordenes, status, metodo_pago, email, total, fecha) VALUES ('$numero_compra', '$orden', '$explosion', 'Pendiente', '$metodo_pago', '$email', '$total', '$date')");


?>
<script language="javascript">
setTimeout('history.back()')
</script>