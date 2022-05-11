
<?php
//include("connect_db.php");

//$miconexion = new connect_db;


session_start();
	require("connect_db.php");

	$username=$_POST['user'];
	$pass=$_POST['password'];


	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$sql2=mysqli_query($mysqli,"SELECT * FROM user_tb WHERE user='$username'");
	if($f2=mysqli_fetch_assoc($sql2)){


		echo "LA(IRa";
		if($pass==$f2['contrasena']){
			echo "LAURA";
			$_SESSION['id']=$f2['id'];
			$_SESSION['user']=$f2['user'];
			$_SESSION['cargo']=$f2['cargo'];

			echo '<script>alert("BIENVENIDO")</script> ';
			echo "<script>location.href='../vista/indexadmin.php'</script>";

			
		}
	}
else{

		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';

		echo "<script>location.href=:'/vista/index.php'</script>";

	}

?>
