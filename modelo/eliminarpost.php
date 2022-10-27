<?php
session_start();
require("connect_db.php");
include("../controlador/actividad.php");

$sql = "delete from post where id_pub=$lista[id_pub]";
		echo $sql;
		
		mysqli_query($mysqli,$sql);
		echo "<script>
					alert('Post eliminado')
				 </script>";
		
		




?>
