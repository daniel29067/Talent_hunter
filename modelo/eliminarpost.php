<?php
session_start();
require("connect_db.php");
include("../controlador/miactividad.php");
$sql2=mysqli_query($mysqli,"SELECT * FROM post WHERE id_post=$_SESSION[id_user]");
if($f2=mysqli_fetch_assoc($sql2)){

	if($pass==$f2['passwd']){

		$id = $_SESSION["id_user"];
		$sql = "delete from user where id_user=$id";
		echo $sql;
		
		mysqli_query($mysqli,$sql);
		echo "<script>
					alert('Cuenta eliminada',location.href='../vista/index.php')
				 </script>";
		
		
		
		
		
	}
	else{
		echo "<script>
					alert('Contraseña Errada') 
					location.href='../vista/eliminardep.php'
				 </script>";
	}
}




?>
