<?php
session_start();
	require("connect_db.php");
extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	$id_pr = $_POST['id_pr'];



		$cargosesion = $_SESSION['CARGO'];
	//$user = $GET['user'];


	$sentencia="update proveedor set empresa='$emp', tel='$telpr', dir='$dirpr',pag_web='$pag_web' where id_pr=$id_pr";
	$sentendiaelimina = "delete from clientes where id_cl = $id_pr";
	echo $sentencia;
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);

	
	if ($resent==null) {
		echo "Error de procesamieno no se han actuaizado los datos";
		echo '<"script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ../controlador/conpr.php?cargo=$cargosesion");

		echo "<script>location.href='../controlador/conpr.php?cargo=$cargosesion'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';

		echo "<script>location.href='../controlador/conpr.php?cargo=$cargosesion'</script>";


	}
?>
