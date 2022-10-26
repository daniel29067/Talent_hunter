<?php
session_start();
require("connect_db.php");

	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$pais=$_SESSION['pais'];
	$region=$_SESSION['region'];	
	$deporte=$_POST['deporte'];
	//$foto= 'defect.jpg';//addslashes(file_get_contents($_FILES['foto']['tmp_name']));
	$description=$_POST['description'];

	if(isset($_POST['submit'])) 
	{
	//$perfil=mysqli_real_escape_string($mysqli,$_POST['foto']);
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
	$checkuser=mysqli_query($mysqli,"SELECT * FROM user WHERE email='$_SESSION[email]'");
	

				//require("connect_db.php");
				//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"UPDATE user SET name='$name', passwd='$pass',deporte='$deporte',profile_foto='$nombre',description='$description' where id_user=$_SESSION[id_user]");
			
				$_SESSION['name'] = $fname;
				$_SESSION['deporte'] = $deporte;
				$_SESSION['description'] = $description;
				$_SESSION['profile_foto'] = $nombre;
				//echo 'Se ha registrado con exito';
					echo "<script>
						alert('Entidad Actualizado con éxito');
					location.href='../vista/perfilpriv.php?id=<?php $_SESSION[id_user];?>'
					 </script>";

			
	
		


?>
