
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
			$_SESSION['pais']=$f2['pais'];

			//echo '<script>alert("BIENVENIDO")</script> ';
			
			echo "<script>
					if($f2[id_rol]==1){
						alert('BIENVENIDO DEPORTISTA') 
						location.href='../vista/profile_dep.php'
					}
					else{
						alert('BIENVENIDA ENTIDAD')
						location.href='../vista/profile_ent.php'
					} </script>";
			//location.href='../vista/indexadmin.php'

			
		}
		else{
			echo "<script>
						alert('Contraseña Errada') 
						location.href='../vista/index.php'
					 </script>";
		}
	}
	else{

		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';

		echo "<script>location.href=:'../vista/index.php'</script>";

	}

?>
