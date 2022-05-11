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
    <title>TOTO TIRE|actualizar proveedores</title>


    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css\acem.css" />
    
  </head>
<body >
<div class="container">

<div class="row">

</div>
</header>

 <div class="menu"style=" background: #ffffff;">
 <?php
include("../vista/menu.php");
?>
</div>
<div class="row">



	<div class="span12">

		<div class="caption">

<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h2> Administración de proveedores registrados</h2>
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Edición de proveedores</h4>
		<div class="row-fluid">

		<?php
		extract($_GET);
		require("../modelo/connect_db.php");

		//$user = 'laura';
		$id = $_GET['id'];

		$sql="SELECT * FROM proveedor WHERE id_pr= '$id'";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
		$ressql=mysqli_query($mysqli,$sql);

		while ($row=mysqli_fetch_row($ressql)){


			    	$id_pr=$row[0];
		    	$emp=$row[1];
		    	$telpr=$row[2];
		    	$dirpr=$row[3];
					$pag_web=$row[4];
			}



		?>

		<form action="../modelo/ejecutaactualizarpr.php" method="post">
				Id_pr<br><input type="text" name="id_pr" value= "<?php echo $id_pr ?>" readonly="readonly"><br>
				empresa<br> <input type="text" name="emp" value="<?php echo $emp ?>"><br>
				telefono <br> <input type="text" name="telpr" value="<?php echo $telpr ?>" pattern="[0-9]*"><br>
				direccion<br> <input type="text" name="dirpr" value="<?php echo $dirpr ?>"><br>
				pagina_web<br> <input type="text" name="pag_web" value="<?php echo $pag_web ?>"><br>
				<br>
				<input type="submit" value="Guardar" class="btn btn-success btn-primary">
			</form>




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

</div><!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>
