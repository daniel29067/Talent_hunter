<?php
require("connect_db.php");
	$emp=$_POST['emp'];
    $telpr= $_POST['telpr'];
	$dirpr=$_POST['dirpr'];
	$pag_web=$_POST['pag_web'];
	

//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");

				

				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO proveedor (empresa,tel,dir,pag_web) VALUES('$emp','$telpr','$dirpr','$pag_web')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("proveedor registrado con éxito");</script> ';
	

			



?>