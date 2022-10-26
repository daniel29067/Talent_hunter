<?php
session_start();
require("connect_db.php");

	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$pais=$_POST['pais'];
	$region=$_POST['region'];	
	$deporte=$_POST['deporte'];
	$foto= 'defect.jpg';//addslashes(file_get_contents($_FILES['foto']['tmp_name']));
	$description=$_POST['description'];



	
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checkuser=mysqli_query($mysqli,"SELECT * FROM user WHERE email='$_SESSION[email]'");
	

				//require("connect_db.php");
				//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"UPDATE user SET name='$name', passwd='$pass',deporte='$deporte',profile_foto='$foto',description='$description' where id_user=$_SESSION[id_user]");
				//echo 'Se ha registrado con exito';
					echo "<script>
						alert('Deportista Actualizado con éxito');
						location.href='../controlador/configent.php'
					 </script>";

			
	
		


?>
