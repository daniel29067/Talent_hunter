
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
	<link rel="stylesheet" href="../vista/css/estiloredepent.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	
</head>
<body >

<nav class="navbar bg-light border-bottom border-2 rounded-bottom" id="enca">
    	<div class="container-fluid px-5">
      		<h2 id="title"> <b> Talent Hunter</b></h2>
    	</div>
  	</nav>

	<div class="container bg-white mt-5 mb-4">
    
    	<!-- Creamos una fila -->
    	<div class="row mt-3 mx-2 justify-content-center">
      
      		<!-- Creamos una columna  -->
      		<div class="col-lg-6 border border-2 rounded">

       			<!-- Contenedor de registro -->
        		<!-- Header -->

        	<div class="row rounded border-bottom border-3 text-center py-2" id="enca">

           		<h3>Edición de usuario</h3>

        	</div>

			<div class="row pt-3">

				<?php extract($_GET);
				require("../modelo/connect_db.php");

				$query="SELECT user.id_user,user.name,user.email,user.passwd,user.pais,pais.name_pais,user.region,user.deporte,user.position,user.profile_foto,user.description from user JOIN pais where user.id_user=$_SESSION[id_user] AND pais.id_pais=$_SESSION[pais]";
				$resultado=$mysqli->query($query);
				$row=$resultado->fetch_assoc(); ?>

          		<!-- Inicio de formulario -->
          		<form method="post" action="..\modelo\ejecutaactualizarent.php" enctype="multipart/form-data">

            		<div class="row justify-content-center align-items-center">

              			<!--ID-->
              			<div class="col-lg-6 my-1">
						  	<label>Id:</label>
							<?php echo $row['id_user']; ?>
              			</div>

						<!--EMAIL-->
						<div class="col-lg-6 my-1">
				  			<label>Email:</label>
							<?php echo $row['email']; ?>
          				</div>

            		</div>

        	</div>

        	<div class="row justify-content-center align-items-center">

          		<!--NOMBRE-->
				<div class="col-lg-6 my-1">
					<label>Nombre:</label>
					<input type="text" class="form-control" name="name" required placeholder="Ingresa tu nombre" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" value="<?php echo $row['name'];?>"/>
              	</div>

          		<!--PASSWD-->
          		<div class="col-lg-6 my-1">
				  	<label>Password:</label>
					<input type="password" name="pass" class="form-control" required placeholder="Ingresa contraseña" value="<?php echo $row['passwd'];?>" />
          		</div> 

        	</div>

       		<div class="row justify-content-center align-items-center">

          		<!--PAIS-->
          		<div class="col-lg-4 my-1">

				  	<label>Pais:</label>
					<br>
					<?php echo $row['name_pais']; ?>
            
          		</div>

          		<!--REGION-->
          		<div class="col-lg-4 my-1">
				  	<label>Region:</label>
					<br>
					<?php echo $row['region']; ?>
          		</div>

          		<!--DEP-->
          		<div class="col-lg-4 my-1">
				  	<label>Deporte:</label>
					<input type="text" class="form-control" name="deporte" required placeholder="Ingresa el Deporte" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" value="<?php echo $row['deporte'];?>" />
          		</div>

        	</div>

        	<div class="row">

          		<!--descripción-->
          		<div class="col-lg-12 my-1">
				  	<label>Descripción:</label>
					<textarea name="description" class="form-control" ><?php echo $row['description'];?></textarea>
          		</div>

        	</div>

			<div class="row justify-content-center align-items-center my-1">
				<!--foto-->
				<div class="col-lg-4">
				  	<img height="50%" width="50%" src="../vista/img/profile_photos/<?php echo $_SESSION['profile_foto']; ?>"/>
          		</div>

				<div class="col-lg-6">
					<label>Foto perfil:</label>
					<input type="file" name="foto" class="form-control" />
				</div>

			</div>

        	<div class="row d-md-flex justify-content-md-end pb-3 text-end">

          		<div class="col-lg-12 my-1 mt-3">
				  	
            		<input class="btn" required type="submit" name="submit" value="Guardar" id="btnn"/>
            		<a class="navbar-brand text-end" href="../vista/perfilpriv.php" >
              			<button type="button" class="btn" id="btnn">Cancelar</button>
            		</a>
          		</div>

        	</div>
        
      		</form>

        </div>

		</div>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>




</body>
</html>
