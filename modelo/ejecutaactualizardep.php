<?php
session_start();
require("connect_db.php");

	$name=$_POST['name'];
    $email= $_POST['email'];
	$pass=$_POST['pass'];
	$deporte=$_POST['deporte'];
	$position=$_POST['position'];
	$foto= addslashes(file_get_contents($_FILES['foto']['tmp_name']));
	$description=$_POST['description'];



	
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checkuser=mysqli_query($mysqli,"SELECT * FROM user WHERE email='$email'");
	

				//require("connect_db.php");
				//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"UPDATE user SET name='$name', email='$email', passwd='$pass',deporte='$deporte',position='$position',profile_foto='$foto',description='$description' where id_user=$_SESSION[id_user]");
				//echo 'Se ha registrado con exito';
					echo "<script>
						alert('Deportista Actualizado con éxito');
						location.href='../controlador/configdep.php'
					 </script>";

			
	
		


?>
