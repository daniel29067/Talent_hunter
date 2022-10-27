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
    <link rel="stylesheet" href="../vista/css/estilogeneral.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>  
<div class="container bg-white w-75 mt-5 mb-5 rounded shadow">
    <div class="row align-items-stretch p-3">

      <div class="mb-4">
      <h3>Registro</h3>
      </div>

      <form class="row" method="post" action="..\modelo\registrarent.php" enctype="multipart/form-data">
        
        <!--ID-->
        <div class="col-lg-6 mb-2">
          <label for="id">ID</label>
          <input type="text" class="form-control" name="id" required placeholder="Ingresa tu Id" />
        </div>

        <!--NOMBRE-->
        <div class="col-lg-6 mb-2">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" name="name" required placeholder="Ingresa tu nombre" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" />
        </div>

        <!--EMAIL-->
        <div class="col-lg-6 mb-2">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" class="form-control" required placeholder="ingresa tu email"  />
        </div>

        <!--PASSWD-->
        <div class="col-lg-6 mb-2">
          <label for="">Password</label>
          <input type="password" class="form-control" name="pass" class="form-control" required placeholder="Ingresa contraseña" />
        </div>  

        <!--PAIS-->
        <div class="col-lg-4 mb-2">
          <label for="pais">Pais</label>
          <select class="form-select" required name="pais">
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
        <div class="col-lg-4 mb-2">
          <label for="region">Region</label>
          <input type="text" class="form-control" name="region" required placeholder="Ingresa tu region" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" />
        </div>

        <!--DEP-->
	      <div class="col-lg-4 mb-2">
          <label for="deporte">Deporte</label>
          <input type="text" class="form-control" name="deporte" required placeholder="Ingresa el Deporte" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" />
        </div>

        <!--foto-->
        <div class="col-lg-8 mb-2">
          <label for="fotop">Foto perfil</label>
          <input required type="file" class="form-control" name="foto"  />
        </div>

        <!--descripción-->
        <div class="col-lg-12 mb-4">
          <label for="descripcion">Descripción</label>
          <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="d-grid">
          <input class="btn btn-primary" required type="submit" name="submit" value="Registrarse"/>
        </div>
        
      </form>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>