<?php
session_start();
require("connect_db.php");

	$idpost=$_GET['idpost'];
	$description=$_POST['description'];


	
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checkuser=mysqli_query($mysqli,"SELECT * FROM post WHERE id_pub='$idpost'");
	

				//require("connect_db.php");
				//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"UPDATE post SET contenido='$description' where id_pub=$idpost");
				
				//echo 'Se ha registrado con exito';
					echo '<script>
						alert("Post Actualizado con éxito");
						location.href="../vista/perfilpriv.php"
					 </script>';

			
	
		


?>
