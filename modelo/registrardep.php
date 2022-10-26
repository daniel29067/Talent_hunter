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
	//$foto= 'defect.jpg';//addslashes(file_get_contents($_FILES['foto']['tmp_name']));
	$description=$_POST['description'];

	if(isset($_POST['submit'])) 
                  {
				  $perfil=mysqli_real_escape_string($mysqli,$_POST['foto']);
				  $result = mysqli_query($mysqli,"SHOW TABLE STATUS WHERE `Name` = 'user'");
				  $data = mysqli_fetch_assoc($result);
				  $next_increment = $data['Auto_increment'];

				  $alea = substr(strtoupper(md5(microtime(true))), 0,12);
				  $code = $next_increment.$alea;

				  
				  $rfoto = $_FILES['foto']['tmp_name'];
				  $formatos_permitidos =  array('bmp','gif' ,'jpg','jpeg','png','blob','');
				  $archivo = $_FILES['foto']['name'];
				  $extension = pathinfo($archivo, PATHINFO_EXTENSION);
				  if(!in_array($extension, $formatos_permitidos) ) {
					  echo  "<script>
					  alert('Error formato no permitido !!') 
					  alert('Recuerde Siempre subir una foto!!') 
					 </script>";
				  }
else{

				  if(is_uploaded_file($rfoto))
				  {
				  $type=$extension;
					$name1 = $code.".".$type;
					$destino = "../vista/img/profile_photos/".$name1;
					$nombre = $name1;
					copy($rfoto, $destino);
				}

				else
				{
					$nombre = 'defect.jpg';
				}


			  }    
			}  

			  

	
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
				mysqli_query($mysqli,"INSERT INTO user VALUES('$id','$name','$email','$pass','$pais','$region','$deporte','$position','$nombre','$description',0,1,1)");
				//echo 'Se ha registrado con exito';
					echo "<script>
						alert('Deportista registrado con éxito');
						location.href='../vista/index.php'
					 </script>";

			}
		
		


?>
