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
    <title>TOTO TIRE|actualizar</title>


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
		<h2> Administración de clientes registrados</h2>
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Edición de clientes</h4>
		<div class="row-fluid">

		<?php
		extract($_GET);
		require("../modelo/connect_db.php");

		//$user = 'laura';
		$id = $_GET['id'];

		$sql="SELECT * FROM clientes WHERE id_cl= '$id'";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
		$ressql=mysqli_query($mysqli,$sql);

		while ($row=mysqli_fetch_row($ressql)){


			    $id_cl=$row[0];
			    $id_pe=$row[1];
		    	$clname=$row[2];
		    	$telcl=$row[3];
		    	$dircl=$row[4];
				$emailcl=$row[5];

			}



		?>

		<form action="../modelo/ejecutaactualizarcl.php" method="post">
				Id_cl<br><input type="text" name="id_cl" value= "<?php echo $id_cl ?>" readonly="readonly"><br>
				Id_pe<br><input type="text" name="id`_pe" value= "<?php echo $id_pe ?>" readonly="readonly"><br>
				nombre<br> <input type="text" name="clname" value="<?php echo $clname ?>"pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+"><br>
				telefono <br> <input type="text" name="telcl" value="<?php echo $telcl ?>"pattern="[0-9]*"><br>
				direccion<br> <input type="text" name="dircl" value="<?php echo $dircl ?>"><br>
				emailcl<br> <input type="email" name="emailcl" value="<?php echo $emailcl ?>"><br>
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
