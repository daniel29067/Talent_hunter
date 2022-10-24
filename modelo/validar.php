
<?php
//include("connect_db.php");

//$miconexion = new connect_db;


session_start();
require("connect_db.php");

$username = $_POST['user_mail'];
$pass = $_POST['user_passwd'];


//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
$sql2 = mysqli_query($mysqli, "SELECT * FROM user WHERE email='$username'");
if ($f2 = mysqli_fetch_assoc($sql2)) {

	if ($pass == $f2['passwd'] and $f2['id_estado'] == 1) {
		$_SESSION['id_user'] = $f2['id_user'];
		$_SESSION['name'] = $f2['name'];
		$_SESSION['email'] = $f2['email'];
		$_SESSION['pais'] = $f2['pais'];
		$_SESSION['region'] = $f2['region'];
		$_SESSION['deporte'] = $f2['deporte'];
		$_SESSION['position'] = $f2['position'];
		$_SESSION['profile_foto'] = $f2['profile_foto'];
		$_SESSION['id_rol'] = $f2['id_rol'];
		$_SESSION['id_estado'] = $f2['id_estado'];
		//echo '<script>alert("BIENVENIDO")</script> ';
		mysqli_query($mysqli, "UPDATE user SET intentos = 0 WHERE email = '$username';");
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


	} elseif ($pass <> $f2['passwd'] and $f2['id_estado'] == 1) {

		mysqli_query($mysqli, "UPDATE user SET intentos = (intentos+1) WHERE email = '$username';");
		if ($f2['intentos'] >=2) {
			mysqli_query($mysqli, "UPDATE user SET id_estado = 0 WHERE email = '$username';");
			
		}
		echo "<script>
						alert('Contraseña Errada') 
						location.href='../vista/index.php'
					 </script>";
		
	} elseif ($pass == $f2['passwd'] or $pass <> $f2['passwd'] and $f2['id_estado'] == 0) {
		echo "<script>
		alert('Usuario desactivado, intente más tarde o cumuniquese con servicio al cliente') 
		location.href='../vista/index.php'
	 </script>";
	} else {

		echo "<script>
		alert('ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR')
		location.href='../vista/index.php'
		</script> ";
		//echo "<script>location.href=:'../vista/index.php'</script>";

	}
}
?>
