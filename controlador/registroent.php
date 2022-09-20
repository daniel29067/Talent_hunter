<?php
  
    // Connect to database 
    $con = mysqli_connect("localhost","root","","talent_hunter");
      
    // mysqli_connect("servername","username","password","database_name")
   
    // Get all the categories from category table
    $sql = "SELECT * FROM `pais`";
    $all_paises = mysqli_query($con,$sql);
   
    // The following code checks if the submit button is clicked 
    // and inserts the data in the database accordingly
    /*if(isset($_POST['submit']))
    {        
        // Store the Category ID in a "id" variable
        $id = mysqli_real_escape_string($con,$_POST['pais']); 
         
           
        
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Crear Entidad</title>
    <link rel="shortcut icon" href="..\vista\img\talent_hunter7-removebg-preview.png">
</head>
<body>  
    <img src="..\vista\img\talent_hunter6.png"/>    
<!-- formulario registro -->

<form method="post" action="..\modelo\registrardep.php" enctype="multipart/form-data" >
  <fieldset>
    <legend  style="font-size: 18pt"><b>Registro</b></legend>
    <!--ID-->
    <div class="form-group">
      <label style="font-size: 14pt"><b>Id:</b></label>
      <input type="text" name="id" placeholder="Ingresa tu Id" />
    </div>
    <!--NOMBRE-->
    <div class="form-group">
      <label style="font-size: 14pt"><b>Nombre:</b></label>
      <input type="text" name="name" placeholder="Ingresa tu nombre" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" />
    </div>
    <!--EMAIL-->
    <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>email:</b></label>
      <input type="email" name="email" class="form-control" required placeholder="ingresa tu email"  />
    </div>
    <!--PASSWD-->
    <div class="form-group">
      <label style="font-size: 14pt; color: #000000;"><b>Password:</b></label>
      <input type="password" name="pass" class="form-control"  placeholder="Ingresa contraseña" />
    </div>
    <!--PAIS-->
    <div class="form-group">
      <label style="font-size: 14pt"><b>Pais:</b></label>
        <select name="pais">
            <?php 
                // use a while loop to fetch data 
                // from the $all_categories variable 
                // and individually display as an option
                while ($pais = mysqli_fetch_array(
                        $all_paises,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $pais["id_pais"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $pais["name_pais"];
                        // To show the category name to the user
                    ?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>  
    </div>
    <!--REGION-->
    <div class="form-group">
      <label style="font-size: 14pt"><b>Region:</b></label>
      <input type="text" name="region" placeholder="Ingresa tu region" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" />
    </div>
    <!--DEP-->
	<div class="form-group">
      <label style="font-size: 14pt"><b>Deporte:</b></label>
      <input type="text" name="deporte" placeholder="Ingresa el Deporte" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" />
    </div>
     <!--foto-->
     <div class="form-group">
      <label style="font-size: 14pt"><b>Foto perfil:</b></label>
      <input type="file" name="foto"  />
    </div>
    <!--descripción-->
    <div class="form-group">
      <label style="font-size: 14pt"><b>Descripción:</b></label>
      <textarea name="description" rows="10" cols="50">Descripción</textarea>
    </div>
    <input  class="btn btn-danger" type="submit" name="submit" value="Registrarse"/>

  </fieldset>
</form>
</div>
              
<!--Fin formulario registro -->
</body>
</html>