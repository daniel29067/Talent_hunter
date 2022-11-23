<?php

// Connect to database 
$con = mysqli_connect("localhost", "root", "", "talent_hunter");

// mysqli_connect("servername","username","password","database_name")

// Get all the categories from category table
$sql = "SELECT * FROM `user` where id_rol=1";
$all_dep = mysqli_query($con, $sql);

// The following code checks if the submit button is clicked 
// and inserts the data in the database accordingly
/*if(isset($_POST['submit']))
    {        
        // Store the Category ID in a "id" variable
        $id = mysqli_real_escape_string($con,$_POST['pais']); 
         
           
        
    }*/
?>
<script>
  function Confirm() {
    var resp = confirm("¿Desea subir el contrato?,\n recuerde que al subir contrato no se puede modificar y tendra que eliminarlo y subirlo de nuevo");

    if (resp == true) {

      return true;
    } else {
      return false;
    }

  }
</script>
<link rel="stylesheet" href="css/estilprodep.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src:"../js/jquery.jscroll.js"></script>
<?php
include("../modelo/connect_db.php");
$query = "SELECT * from user where id_user=$_SESSION[id_user]";
$resultado = $mysqli->query($query);
while ($row = $resultado->fetch_assoc()) {
?>



  <!-- contenedor padre -->

  <div class="container bg-white mt-3">

    <!-- contenedor hijo nuevas publicaciones -->
    <div class="row mt-3 mx-2 justify-content-center">

      <div class="col-lg-6 border border-2 rounded">

        <!-- Contenedor nuevas publicaciones -->
        <div class="row p-2 align-items-center rounded border-bottom border-3" id="enca">

          <!-- Encabezado -->
          <div class="col-3">

          <?php
        }
          ?>

          </div>

          <div class="col-9 text-end">
            <h4>Nuevo Contrato</h4>
          </div>

        </div>

        <!-- body -->

        <form action="" method="post" enctype="multipart/form-data">

          <div class="row px-4 pt-4">
            <label>Entidad: <?php echo $_SESSION['name'] ?></label>
          </div>
          <div class="row px-4 pt-4">
            <label>Deportista:</label>





            <select class="form-select" placeholder="Selecciona un deportista" required name="deportista">
              <?php
              // use a while loop to fetch data 
              // from the $all_categories variable 
              // and individually display as an option
              while ($dep = mysqli_fetch_array(
                $all_dep,
                MYSQLI_ASSOC
              )) :;
              ?>
                <option value="<?php echo $dep["id_user"];
                                // The value we usually set is the primary key
                                ?>">
                  <?php echo ($dep["name"] . ", " . $dep['deporte']);
                  // To show the category name to the user
                  ?>
                </option>
              <?php
              endwhile;
              // While loop must be terminated
              ?>
            </select>

          </div>

          <div class="row px-4 pt-4">
            <label for="date-start">Fecha de inicio</label>
            <input type="date" id="start" name="date_start" value="AAAA-MM-DD" min="2022-11-23" max="2100-12-31" required>
          </div>
          <div class="row px-4 pt-4">
            <label for="date-end">Fecha de Final</label>
            <input type="date" id="start" name="date_end" value="AAAA-MM-DD" min="2022-11-23" max="2100-12-31" required>
          </div>

          <div class="row p-4">

            <div class="gap-2 rounded text-center align-items-center justify-content-center p-2">

              <div class="file">

                <div class="row justify-content-between">

                  <div class="col-lg-4 p-1 m-1 align-self-start rounded " id="div_file">

                    <label for="archivo">


                      Contrato

                    </label>

                    <input type="file" name="contrato" id="archivo" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />

                  </div>

                  <div class="col-lg-4 align-self-center">
                    <span id="nombres"></span>
                  </div>

                </div>

              </div>

            </div>

          </div>

          <!-- footter -->

          <div class="row p-2 border-top border-3 rounded-bottom justify-content-end" id="pie">

            <div class="col-md-4 d-grid text-end p-0">

              <button type="submit" name="subir_contrato" class="btn shadow" id="btnn" onclick="return Confirm()">Subir contrato</button>

            </div>

          </div>

        </form>

      </div>

    </div>

  </div>

  <br>

  <!-- subida a la base de datos -->

  <?php
  if (isset($_POST['subir_contrato'])) {

    $publicacion = mysqli_real_escape_string($mysqli, $_SESSION['name']);
    $result = mysqli_query($mysqli, "SHOW TABLE STATUS WHERE `Name` = 'contratos'");
    $data = mysqli_fetch_assoc($result);
    $next_increment = $data['Auto_increment'];

    $alea = substr(strtoupper(md5(microtime(true))), 0, 12);
    $code = $next_increment . $alea;

    $rfoto = $_FILES['contrato']['tmp_name'];
    $formatos_permitidos =  array('pdf');
    $archivo = $_FILES['contrato']['name'];
    $extension = pathinfo($archivo, PATHINFO_EXTENSION);

    if (!in_array($extension, $formatos_permitidos)) {

      echo  "<script>
        
          alert('Error formato no permitido !!') 
          
          alert('Recuerde Siempre subir un pdf!!') 
          </script>";
    } else {

      if (is_uploaded_file($rfoto)) {

        $type = $extension;
        $name = $code . "." . $type;
        $destino = "../vista/contratos/" . $name;
        $nombre = $name;
        copy($rfoto, $destino);
      } else {
        $nombre = '';
      }

      $subir = mysqli_query(
        $mysqli,
        "INSERT INTO contratos (id_ent,id_dep,fecha_inicio,fecha_fin,documento) values ('$_SESSION[id_user]','$_POST[deportista]','$_POST[date_start]','$_POST[date_end]','$nombre');"

      );
      
				mysqli_query($mysqli,"UPDATE user SET id_estado=2 where id_user=$_POST[deportista]");

      if ($subir) {
        echo '<script>window.location="../vista/contratos.php"</script>';
      }
    }
  }
  ?>