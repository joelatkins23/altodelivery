<?php require_once('../conn.php') ?>
<?php 

	$orden= $_GET['orden'];
	
	$modifica= "DELETE FROM orden WHERE orden='$orden'";

	$resultado = mysqli_query($connect, $modifica)
	or die ("Error al insertar los registros");

	mysqli_close($connect);

 ?>
 <script language="javascript">
setTimeout('history.back()')
</script>
