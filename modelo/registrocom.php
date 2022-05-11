<?php
require("connect_db.php");
	   $precio= $_POST['precio_co'];
	   $cantidad=$_POST['cantidad_co'];
	   $total_co=$_POST['total_co'];



//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");



				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO compra (precio,cantidad,total_co) VALUES('$precio','$cantidad','$total_co')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("compra registrada con éxito");</script> ';






?>
