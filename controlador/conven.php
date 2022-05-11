<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:../vista/index.php");
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TOTO TIRE|consultar ventas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>


  </head>


		<body>

					<div class="menu">
						<?php
						include("../vista/menu.php");
						?>
					</div>

<div class="container">

<div class="row">



	<div class="span12">

		<div class="caption">

<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h2> Administración de ventas registradas</h2>
		<div class="well well-small">

		<h4>Tabla de ventas</h4>
		<div class="row-fluid">




			<?php

				require("../modelo/connect_db.php");
				$sql=("SELECT * FROM venta");

//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				$query=mysqli_query($mysqli,$sql);

				echo "<table border='1'; class='table table-hover';>";
					echo "<tr class='warning'>";
					if($_GET['cargo'] == 'ventas'){
						echo "<td>Id_ve</td>";
						echo "<td>id_pe</td>";
						echo "<td>fecha_pei</td>";
						echo "<td>fecha_en</td>";
						echo "<td>cantidad</td>";
						echo "<td>total_ve</td>";
						}
					else if($_GET['cargo'] == 'admin')
					{	echo "<td>Id_ve</td>";
						echo "<td>id_pe</td>";
						echo "<td>fecha_pei</td>";
						echo "<td>fecha_en</td>";
						echo "<td>cantidad</td>";
						echo "<td>total_ve</td>";
						echo "<td>Editar</td>";
						echo "<td>Borrar</td>";
									}
					echo "</tr>";


			?>

<?php
				 while($arreglo=mysqli_fetch_array($query)){
				  	echo "<tr class='success'>";
				  	if($_GET['cargo'] == 'ventas'){
				    	echo "<td>$arreglo[0]</td>";
				    	echo "<td>$arreglo[1]</td>";
				    	echo "<td>$arreglo[2]</td>";
				    	echo "<td>$arreglo[3]</td>";
						echo "<td>$arreglo[4]</td>";
						echo "<td>$arreglo[5]</td>";
						  }
				    else if($_GET['cargo'] == 'admin')
				    {
				    	echo "<td>$arreglo[0]</td>";
				    	echo "<td>$arreglo[1]</td>";
				    	echo "<td>$arreglo[2]</td>";
				    	echo "<td>$arreglo[3]</td>";
						echo "<td>$arreglo[4]</td>";
						echo "<td>$arreglo[5]</td>";

				    	echo "<td><a href='actualizarven.php?id=$arreglo[0]'><img src='css/editar.jpg' class='img-rounded' width='10' height='10'></td>";
						echo "<td><a href='eliminarven.php?id=$arreglo[0]'><img src='css/borrar.jpg' class='img-rounded' /></a></td>";

}

					echo "</tr>";
				}

				echo "</table>";

					extract($_GET);

					/*$idborrar = $_GET['idborrar'];
					if(@$idborrar==2){

						$sqlborrar="DELETE FROM user_tb WHERE id=$id";
						$resborrar=mysqli_query($mysqli,$sqlborrar);
						echo '<script>alert("REGISTRO ELIMINADO")</script> ';
						//header('Location: proyectos.php');
						echo "<script>location.href='admin.php'</script>";
					}*/

			?>






		<div class="span8">

		</div>
		</div>
		<br/>



		<!--EMPIEZA DESLIZABLE-->

		 <!--TERMINA DESLIZABLE-->





		</div>






<!--///////////////////////////////////////////////////Termina cuerpo del documento interno////////////////////////////////////////////-->
</div>

	</div>
</div>
<!-- Footer
      ================================================== -->
<hr class="soften"/>
<footer class="footer">

<hr class="soften"/>

 </footer>
</div><!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>
