<?php
require("connect_db.php");
	$marca=$_POST['marca'];
    $precio= $_POST['precio'];

	

//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");

				

				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO producto (id_co,marca,precio) VALUES(1,'$marca','$precio')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("productos registrado con éxito");</script> ';
	

			



?>