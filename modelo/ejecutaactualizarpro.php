<?php
session_start();
	require("connect_db.php");
extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	$id_pro = $_POST['id_pro'];
	//$user = $GET['user'];


	$sentencia="update producto set marca='$marca', precio='$precio'where id_pro='$id_pro'";
	$sentendiaelimina = "delete from clientes where id_cl = '$id_cl'";
	echo $sentencia;
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);
	$cargosession = $_SESSION['CARGO'];
	if ($resent==null) {
		echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ../controlador/conpro.php?cargo=$cargosession");

		echo "<script>location.href='../controlador/conpro.php?Cargo=$cargosession'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';

		echo "<script>location.href='../controlador/conpro.php?cargo=$cargosession'</script>";


	}
?>
