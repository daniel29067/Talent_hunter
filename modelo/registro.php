<?php

	$username=$_POST['username'];
    $pass= $_POST['pass'];
	$rpass=$_POST['rpass'];
	$cargo=$_POST['cargo'];
		$email=$_POST['email'];



	require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checkuser=mysqli_query($mysqli,"SELECT * FROM user_tb WHERE user='$username'");
	$check_user=mysqli_num_rows($checkuser);
		if($pass==$rpass){
			if($check_user>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el nombre designado para un usuario, verifique sus datos");</script> ';
			}else{

				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO user_tb VALUES('','$username','$pass','$cargo','$email')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';

			}

		}else{
			echo 'Las contraseñas son incorrectas';
		}


?>
