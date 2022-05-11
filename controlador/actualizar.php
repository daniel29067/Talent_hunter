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
		<h2> Administración de usuarios registrados</h2>
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Edición de usuarios</h4>
		<div class="row-fluid">

		<?php
		extract($_GET);
		require("../modelo/connect_db.php");

		//$user = 'laura';
		$id = $_GET['id'];

		$sql="SELECT * FROM user_tb WHERE id= '$id'";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
		$ressql=mysqli_query($mysqli,$sql);

		while ($row=mysqli_fetch_row($ressql)){


			    	$id=$row[0];
		    	$user=$row[1];
		    	$pass=$row[2];
		    	$cargo=$row[3];
					$email=$row[4];

			}



		?>

		<form action="../modelo/ejecutaactualizar.php" method="post">
				Id<br><input type="text" name="id" value= "<?php echo $id ?>" readonly="readonly" ><br>
				Usuario<br> <input type="text" name="user" value="<?php echo $user ?>" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+"><br>
				Password <br> <input type="text" name="contrasena" value="<?php echo $pass ?>"><br>
				cargo<br> <input type="text" name="cargo" value="<?php echo $cargo ?>" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+"><br>
				email<br> <input type="email" name="email" value="<?php echo $email ?>"><br>
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
