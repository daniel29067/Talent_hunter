<?php
session_start();
require("connect_db.php");
extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	$id = $_POST['id'];
	//$user = $GET['user'];
	$pass = $_POST['contrasena'];


	$cargosesion = $_SESSION['CARGO'];

	$sentencia="update user_tb set user='$user', contrasena='$pass', cargo='$cargo',email='$email' where id='$id'";
	$sentendiaelimina = "delete from user_tb where id = '$id'";
	echo $sentencia;
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);



	if ($resent==null) {
		echo "Error de procesamieno no se han actuaizado los datos";
		echo '<"script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: ../controlador/consult.php?cargo=$cargosesion");

		echo "<script>location.href='../controlador/consult.php?cargo=$cargosesion'</script>";
	}else {
		echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';

		echo "<script>location.href='../controlador/consult.php?cargo=$cargosesion'</script>";


	}
?>
