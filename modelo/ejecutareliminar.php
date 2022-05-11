<html>
<?php
session_start();
extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	$id = $_POST['id'];
	require("connect_db.php");

	$sentendiaelimina = "delete from user_tb where id = '$id'";
	echo $sentencia;
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentenciaelimina);
	if ($resent==null) {
		echo "Error de procesamieno no se han actuaizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: consult.php?cargo=$_SESSION['CARGO']");

		echo "<script>location.href='consult.php?cargo=$_SESSION['CARGO']'</script>";
	}else {
		echo '<script>alert("REGISTRO ELIMINADO")</script> ';

		echo "<script>location.href='consult.php?cargo=$_SESSION['CARGO']'</script>";


	}
?>
</html>
