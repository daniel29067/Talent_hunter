
<?php
//include("connect_db.php");

//$miconexion = new connect_db;


session_start();
	require("connect_db.php");

	$username=$_POST['user_mail'];
	$pass=$_POST['user_passwd'];


	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$sql2=mysqli_query($mysqli,"SELECT * FROM user WHERE email='$username'");
	if($f2=mysqli_fetch_assoc($sql2)){


		
		if($pass==$f2['passwd']){
			$_SESSION['id_user']=$f2['id_user'];
			$_SESSION['email']=$f2['email'];
			$_SESSION['id_rol']=$f2['id_rol'];

			//echo '<script>alert("BIENVENIDO")</script> ';
			
			echo "<script>
					if($f2[id_rol]==1){
						alert('BIENVENIDO DEPORTISTA') 
			
					}
					else{
						alert('BIENVENIDA ENTIDAD')
					} </script>";
			//location.href='../vista/indexadmin.php'

			
		}
	}
else{

		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';

		echo "<script>location.href=:'../vista/index.php'</script>";

	}

?>
