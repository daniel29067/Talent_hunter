<?php
	require("connect_db.php");

	$id=$_POST['id'];
	$name=$_POST['name'];
    $email= $_POST['email'];
	$pass=$_POST['pass'];
	$pais=$_POST['pais'];
	$region=$_POST['region'];	
	$deporte=$_POST['deporte'];
	$foto= addslashes(file_get_contents($_FILES['foto']['tmp_name']));



	
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checkuser=mysqli_query($mysqli,"SELECT * FROM user WHERE email='$email'");
	$check_user=mysqli_num_rows($checkuser);
		
			if($check_user>0){
				echo ' <script language="javascript">alert("Atencion, ya existe una cuenta para ese email");</script> ';
			}else{

				//require("connect_db.php");
				//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO user VALUES('$id','$name','$email','$pass','$pais','$region','$deporte','','$foto',2,1)");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Entidad registrada con éxito");</script> ';

			}
		
		


?>