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
    <title>TOTO TIRE|actualizar compra</title>


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



	<div class="span12">

		<div class="caption">

<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h2> Administración de compras registradas</h2>
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Edición de compras</h4>
		<div class="row-fluid">

		<?php
		extract($_GET);
		require("../modelo/connect_db.php");

		//$user = 'laura';
		$id = $_GET['id'];

		$sql="SELECT * FROM compra WHERE id_co= '$id'";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
		$ressql=mysqli_query($mysqli,$sql);

		while ($row=mysqli_fetch_row($ressql)){


			    	$id_co=$row[0];
		    	$id_pr=$row[1];
		    	$precio=$row[2];
		    	$cantidad=$row[3];
		    	$total_co=$row[4];
			}



		?>

		<form action="../modelo/ejecutaactualizarcom.php" method="post">
				Id_co<br><input type="text" name="id_co" value= "<?php echo $id_co?>" readonly="readonly"><br>
				Id_pr<br><input type="text" name="id_pr" value= "<?php echo $id_pr ?>" readonly="readonly"><br>
				precio<br> <input type="text" name="precio_co" value="<?php echo $precio ?>" pattern="[0-9]*"><br>
				cantidad <br> <input type="text" name="cantidad_co" value="<?php echo $cantidad ?>" pattern="[0-9]*"><br>
				total_co <br> <input type="text" name="total_co" value="<?php echo $total_co ?>"pattern="[0-9]*"><br>
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
