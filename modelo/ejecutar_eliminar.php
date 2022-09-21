<?php
session_start();
require("connect_db.php");

$pass=$_POST['delete_passwd'];
$sql2=mysqli_query($mysqli,"SELECT * FROM user WHERE id_user=$_SESSION[id_user]");
if($f2=mysqli_fetch_assoc($sql2)){

	if($pass==$f2['passwd']){

		$id = $_SESSION["id_user"];
		$sql = "delete from user where id_user=$id";
		echo $sql;
		
		mysqli_query($mysqli,$sql);
		echo "<script>
					alert('Contraseña Errada',location.href='../vista/index.php')
				 </script>";
		
		
		
		
		
	}
	else{
		echo "<script>
					alert('Contraseña Errada') 
					location.href='../vista/eliminar.php'
				 </script>";
	}
}




?>

