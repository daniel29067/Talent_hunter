<?php 
session_start();


if($_SESSION['email']){
	session_destroy();
	echo "<script>
					alert('Sesion Cerrada',location.href='../vista/index.php')
				 </script>";
}

else{

	header('location:../vista/profile_dep.php');

}


?>