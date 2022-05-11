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
    <title>TOTO TIRE|actualizar ventas</title>


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
		<h2> Administración de ventas registradas</h2>
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Edición de ventas</h4>
		<div class="row-fluid">

		<?php
		extract($_GET);
		require("../modelo/connect_db.php");

		//$user = 'laura';
		$id = $_GET['id'];

		$sql="SELECT * FROM venta WHERE id_ve= '$id'";
		echo $sql;
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
		$ressql=mysqli_query($mysqli,$sql);

		while ($row=mysqli_fetch_row($ressql)){


			    $id_ve=$row[0];
		    	$id_pe=$row[1];
		    	$fe_pe=$row[2];
		    	$fe_en=$row[3];
		    	$cantidad_ve=$row[4];
		    	$total_ve=$row[5];
			}



		?>

		<form action="../modelo/ejecutaactualizarven.php" method="post">
				Id_ve<br><input type="text" name="id_ve" value= "<?php echo $id_ve?>" readonly="readonly"><br>
				Id_pe<br><input type="text" name="id_pr" value= "<?php echo $id_pe ?>" readonly="readonly"><br>
				fecha pedido<br> <input type="date" name="fe_pe" value="<?php echo $fe_pe ?>"><br>
				fecha entrega<br> <input type="date" name="fe_en" value="<?php echo $fe_en ?>"><br>
				cantidad <br> <input type="text" name="cantidad_ve" value="<?php echo $cantidad_ve ?>" pattern="[0-9]*"><br>
				total_ve <br> <input type="text" name="total_ve" value="<?php echo $total_ve ?>" pattern="[0-9]*"><br>
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
