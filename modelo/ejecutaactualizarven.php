<?php
session_start();
	require("connect_db.php");
extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	
	$id_ve = $_POST['id_ve'];
	$cargosesion = $_SESSION['CARGO'];
	$fe_pe= $_POST['fe_pe'];
	$fe_en= $_POST['fe_en'];
	$cantidad_ve= $_POST['cantidad_ve'];
	$total_ve= $_POST['total_ve'];
	//$user = $GET['user'];


	$sentencia="update venta set  fecha_pei='$fe_pe',fecha_en='$fe_en',cantidad='$cantidad_ve',total_ve='$total_ve' where id_ve='$id_ve'";
	$sentendiaelimina = "delete from clientes where id_ve = '$id_ve'";
	echo $sentencia;
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {
		echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ../controlador/conven.php?cargo=$cargosesion");

		echo "<script>location.href='../controlador/conven.php?cargo=$cargosesion'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';

		echo "<script>location.href='../controlador/conven.php?cargo=$cargosesion'</script>";


	}
?>