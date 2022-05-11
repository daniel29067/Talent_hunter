<?php
require("connect_db.php");
	$clname=$_POST['clname'];
    $telcl= $_POST['telcl'];
	$dircl=$_POST['dircl'];
	$emailcl=$_POST['emailcl'];
	

//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");

				

				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO clientes (name,tel,dir,email) VALUES('$clname','$telcl','$dircl','$emailcl')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("cliente registrado con éxito");</script> ';
	

			



?>
