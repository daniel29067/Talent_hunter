<?php
	require("connect_db.php");

	$id=$_POST['id'];
	$name=$_POST['name'];
    $email= $_POST['email'];
	$pass=$_POST['pass'];
	$pais=$_POST['pais'];
	$region=$_POST['region'];	
	$deporte=$_POST['deporte'];
	$position=$_POST['position'];
	$foto= 'defect.jpg';//addslashes(file_get_contents($_FILES['foto']['tmp_name']));
	$description=$_POST['description'];

	


	
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checkuser=mysqli_query($mysqli,"SELECT * FROM user WHERE email='$email'");
	$check_user=mysqli_num_rows($checkuser);
		
			if($check_user>0){
				echo ' <script language="javascript">alert("Atencion, ya existe una cuenta para ese email")
				location.href="../controlador/registrodep.php"
				;</script> ';
			}else{

				//require("connect_db.php");
				//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO user VALUES('$id','$name','$email','$pass','$pais','$region','$deporte','$position','$foto','$description',0,1,1)");
				//echo 'Se ha registrado con exito';
					echo "<script>
						alert('Deportista registrado con éxito');
						location.href='../vista/index.php'
					 </script>";

			}
		
		


?>
