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
    <title>Talent Hunter|Crear Deportista</title>
    <link rel="stylesheet" href="../vista/css/estiloredepent.css">
    <link rel="shortcut icon" href="..\vista\img\talent_hunter7-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>

  <!-- header -->

  <nav class="navbar bg-light border-bottom border-2 rounded-bottom" id="enca">
    <div class="container-fluid px-5">
      <h2 id="title"><b>Talent Hunter</b></h2>
    </div>
  </nav>
  
  <!-- contenedor padre -->
  <div class="container bg-white mt-5 mb-4">
    
    <!-- Creamos una fila -->
    <div class="row mt-3 mx-2 justify-content-center">
      
      <!-- Creamos una columna  -->
      <div class="col-lg-6 border border-2 rounded">

        <!-- Contenedor de registro -->
        <!-- Header -->

        <div class="row rounded border-bottom border-3 text-center py-2" id="enca">

            <h3>Crea una cuenta</h3>

        </div>

        <div class="row pt-3">

          <!-- Inicio de formulario -->
          <form method="post" action="..\modelo\registrardep.php" enctype="multipart/form-data">

            <div class="row justify-content-center">

              <!--ID-->
              <div class="col-lg-6 my-1">       
                <input type="text" class="form-control" name="id" required placeholder="Ingresa tu Id" />
              </div>

              <!--NOMBRE-->
              <div class="col-lg-6 my-1">
                <input type="text" class="form-control" name="name" required placeholder="Ingresa tu nombre" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" />
              </div>

            </div>

        </div>

        <div class="row">

          <!--EMAIL-->
          <div class="col-lg-6 my-1">
            <input type="email" class="form-control" name="email" class="form-control" required placeholder="Ingresa tu email"  />
          </div>

          <!--PASSWD-->
          <div class="col-lg-6 my-1">
            <input type="password" class="form-control" name="pass" class="form-control" required placeholder="Ingresa contraseña" />
          </div> 

        </div>

        <div class="row">

          <!--PAIS-->
          <div class="col-lg-4 my-1">

            <label for="pais">Pais</label>

            <select class="form-select" placeholder="Selecciona un pais" required name="pais">
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
          <div class="col-lg-4 my-1">
            <label for="region">Region</label>
            <input type="text" class="form-control" name="region" required placeholder="Ingresa tu region" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" />
          </div>

          <!--DEP-->
          <div class="col-lg-4 my-1">
            <label for="deporte">Deporte</label>
            <input type="text" class="form-control" name="deporte" required placeholder="Ingresa el Deporte" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú\s]+" />
          </div>

        </div>

        <div class="row">

          <!--POS-->
          <div class="col-lg-4 my-1">
            <label for="posicion">Posicion</label>
            <input type="text" class="form-control" name="position" required placeholder="Ingresa la posicion" pattern="[A-Za-zzÑñÁÉÍÓÚáéíóú\s]+" />
          </div>

          <!--foto-->
          <div class="col-lg-8 my-1">
            <label for="fotop">Foto perfil</label>
            <input required type="file" class="form-control" name="foto"  />
          </div>

        </div>

        <div class="row">

          <!--descripción-->
          <div class="col-lg-12 my-1">
            <label for="descripcion">Descripción</label>
            <textarea name="description" class="form-control"></textarea>
          </div>

        </div>

        <div class="row d-md-flex justify-content-md-end pb-3 text-end">

          <div class="col-lg-12 my-1 mt-3">
            <input class="btn" required type="submit" name="submit" value="Registrarse" id="btnn"/>
            <a class="navbar-brand text-end" href="../vista/index.php" >
              <button type="button" class="btn" id="btnn">Cancelar</button>
            </a>
          </div>

        </div>
        
      </form>

      </div>
    
    </div>
  
  </div>

</body>
</html>