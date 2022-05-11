<?php
require("connect_db.php");
	   $fe_pe= $_POST['fe_pe'];
	   $fe_en=$_POST['fe_en'];
	   $cantidad=$_POST['cantidad_ve'];
	   $total_ve=$_POST['total_ve'];
 
	

//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");

				

				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO venta (fecha_pei,fecha_en,cantidad,total_ve) VALUES('$fe_pe','$fe_en','$cantidad','$total_ve')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("venta registrada con éxito");</script> ';
	

			



?>