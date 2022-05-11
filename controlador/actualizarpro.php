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
    <title>TOTO TIRE|actualizar productos</title>


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
		<h2> Administración de productos registrados</h2>
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Edición de productos</h4>
		<div class="row-fluid">

		<?php
		extract($_GET);
		require("../modelo/connect_db.php");

		//$user = 'laura';
		$id = $_GET['id'];

		$sql="SELECT * FROM producto WHERE id_pro= '$id'";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
		$ressql=mysqli_query($mysqli,$sql);

		while ($row=mysqli_fetch_row($ressql)){


			    	$id_pro=$row[0];
		    	$id_co=$row[1];
		    	$marca=$row[2];
		    	$precio=$row[3];
			}



		?>

		<form action="../modelo/ejecutaactualizarpro.php" method="post">
				Id_pro<br><input type="text" name="id_pro" value= "<?php echo $id_pro ?>" readonly="readonly"><br>
				Id_co<br><input type="text" name="id_co" value= "<?php echo $id_co ?>" readonly="readonly"><br>
				marca <br> <input type="text" name="marca" value="<?php echo $marca ?>" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+"><br>
				precio<br> <input type="text" name="precio" value="<?php echo $precio ?>" pattern="[0-9]*"><br>
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
