<html>
<?php
session_start();

extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	$id = $_POST['id_pr'];
	require("connect_db.php");

	$sentendiaelimina = "delete from proveedor where id_pr = '$id'";
	echo $sentencia;
	$cargosesion = $_SESSION['CARGO'];
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentenciaelimina);
	if ($resent==null) {
		echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';

		header("location: conpr.php?cargo=$cargosesion");

		echo "<script>location.href='conpr.php?cargo=$cargosesion'</script>";
	}else {
		echo '<script>alert("REGISTRO ELIMINADO")</script> ';

		echo "<script>location.href='conpr.php?cargo=$cargosesion'</script>";


	}
?>
</html>
