
<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['start']))
{

    //Set the session start time

    $_SESSION['start'] = time();

}
if (@!$_SESSION['email']) {
	header("Location:../vista/index.php");
}
else{if (isset($_SESSION['start']) && (time() - $_SESSION['start'] >300)) {

    //Unset the session variables

    session_unset();

    //Destroy the session

    session_destroy();
    echo "<script>
    alert('Sesion cerrada por inactividad') 
 </script>";
    header("Location:../vista/index.php");
    

}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Crear Deportista</title>
    <link rel="shortcut icon" href="..\vista\img\talent_hunter7-removebg-preview.png">
</head>
<body >
<div class="container">
	<div class="row">
		<div class="span12">
			<div class="caption">
				<h2> Administración de usuarios registrados</h2>
					<div class="well well-small">
						<hr class="soft"/>
						<h4>Edición de usuarios</h4>
							<div class="row-fluid">

								<?php
									extract($_GET);
									require("../modelo/connect_db.php");

									$query="SELECT user.id_user,user.name,user.email,user.passwd,user.pais,pais.name_pais,user.region,user.deporte,user.position,user.profile_foto,user.description from user JOIN pais where user.id_user=$_SESSION[id_user] AND pais.id_pais=$_SESSION[pais]";
									$resultado=$mysqli->query($query);
									$row=$resultado->fetch_assoc(); ?>

								

								<form method="post" action="..\modelo\ejecutaactualizarent.php" enctype="multipart/form-data" >
										<fieldset>
											<legend  style="font-size: 18pt"><b>Actualizar Datos</b></legend>
											
											<!--ID-->
											<div class="form-group">
											<label style="font-size: 14pt">Id:</label>
											<h5><?php echo $row['id_user']; ?></h5>
											</div>
											<!--NOMBRE-->
											<div class="form-group">
											<label style="font-size: 14pt"><b>Nombre:</b></label>
											<input type="text" name="name" required placeholder="Ingresa tu nombre" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" value="<?php echo $row['name'];?>"/>
											</div>
											<!--EMAIL-->
											<div class="form-group">
											<label style="font-size: 14pt; color: #000000;"><b>email:</b></label>
											<h5><?php echo $row['email'] ?></h5>
											</div>
											<!--PASSWD-->
											<div class="form-group">
											<label style="font-size: 14pt; color: #000000;"><b>Password:</b></label>
											<input type="password" name="pass" class="form-control" required placeholder="Ingresa contraseña" value="<?php echo $row['passwd'];?>" />
											</div>
											<!--PAIS-->
											<div class="form-group">
											<label style="font-size: 14pt">Pais:</label>
											<h5><?php echo $row['name_pais']; ?></h5>
											</div>
											<!--REGION-->
											<div class="form-group">
											<label style="font-size: 14pt"><b>Region:</b></label>
											<h5><?php echo $row['region']; ?></h5>
											</div>
											<!--DEP-->
											<div class="form-group">
											<label style="font-size: 14pt"><b>Deporte:</b></label>
											<input type="text" name="deporte" required placeholder="Ingresa el Deporte" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" value="<?php echo $row['deporte'];?>" />
											</div>
											<!--foto-->
											<div class="form-group">
											<img height="100px" src="../vista/img/profile_photos/<?php echo $_SESSION['profile_foto']; ?>"/><br> 
											<label style="font-size: 14pt"><b>Foto perfil:</b></label>
											<input type="file" name="foto"  />
											</div>
											<!--descripción-->
											<div class="form-group">
											<label style="font-size: 14pt"><b>Descripción:</b></label>
											<textarea name="description" rows="10" cols="50" ><?php echo $row['description'];?></textarea>
											</div>
											<input  class="btn btn-danger" required type="submit" name="submit" value="Guardar"/>

										</fieldset>
										</form>
										</div>
										<!--Fin formulario registro -->
							</div>
					</div>
			</div>
		</div>
	</div>
</div><!-- /container -->

</body>
</html>
