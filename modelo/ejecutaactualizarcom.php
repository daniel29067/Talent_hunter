<?php
session_start();
	require("connect_db.php");
extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	$id_co = $_POST['id_co'];
		$cargosesion = $_SESSION['CARGO'];
	//$user = $GET['user'];


	$sentencia="update compra set  precio='$precio_co',cantidad='$cantidad_co',total_co='$total_co' where id_co='$id_co'";
	$sentendiaelimina = "delete from clientes where id_cl = '$id_cl'";
	echo $sentencia;
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {
		echo "Error de procesamieno no se han actuaizado los datos";
		echo '<"script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ../controlador/concom.php?cargo=$cargosesion");

		echo "<script>location.href='../controlador/concom.php?cargo=$cargosesion'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';

		echo "<script>location.href='../controlador/concom.php?cargo=$cargosesion'</script>";


	}
?>
