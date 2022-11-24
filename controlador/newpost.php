<link rel="stylesheet" href="css/estilprodep.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src:"../js/jquery.jscroll.js"></script>
<?php
include("../modelo/connect_db.php");
$query = "SELECT * from user where id_user=$_SESSION[id_user]";
$resultado = $mysqli->query($query);
while ($row = $resultado->fetch_assoc()) {
?>

  <nav class="container-fluid border-bottom border-2 rounded-bottom">

    <div class="row px-5">

      <div class="col-lg-2 pt-2">
        <!-- <a class="navbar-brand" href="" id="title"> -->
        <h2 id="title"><b>Talent Hunter</b></h2> <!-- </a> -->
      </div>

      <div class="col-lg-8 d-flex align-items-center justify-content-center">

      <div class="col-lg-2 d-flex align-items-center justify-content-end">

        <a class="text-end" href="../vista/perfilpriv.php">
          <!--<img height="100px" src="data:Image/png;base64,<?php echo base64_encode($row['profile_foto']); ?>"/>   --->
          <img id="fot" src="../vista/img/profile_photos/<?php echo $_SESSION['profile_foto']; ?>" />
        </a>

      </div>

    </div>
  </nav>

  <!-- contenedor padre -->

  <div class="container bg-white mt-3">

    <!-- contenedor hijo nuevas publicaciones -->
    <div class="row mt-3 mx-2 justify-content-center">

      <div class="col-lg-6 border border-2 rounded">

        <!-- Contenedor nuevas publicaciones -->
        <div class="row p-2 align-items-center rounded border-bottom border-3" id="enca">

          <!-- Encabezado -->
          <div class="col-3">

            <!--<img height="100px" src="data:Image/png;base64,<?php echo base64_encode($row['profile_foto']); ?>"/>   --->
            <img id="fot" src="../vista/img/profile_photos/<?php echo $_SESSION['profile_foto']; ?>" />
          <?php
        }
          ?>

          </div>

          <div class="col-9 text-end">
            <h4>Nueva publicación</h4>
          </div>

        </div>

        <!-- body -->

        <form action="" method="post" enctype="multipart/form-data">

          <div class="row px-4 pt-4">

            <textarea name="publicacion" onkeypress="return validarn(event)" placeholder="Muestra tus habilidades" class="form-control" cols="200" rows="3" required></textarea>

          </div>

          <div class="row p-4">

            <div class="gap-2 rounded text-center align-items-center justify-content-center p-2">

              <div class="file">

                <div class="row justify-content-between">

                  <div class="col-lg-4 p-1 m-1 align-self-start rounded " id="div_file">

                    <label for="archivo">

                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16" id="svg">
                        <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z" />
                      </svg>

                      Video &nbsp;&nbsp; /

                      &nbsp;&nbsp;

                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                        <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                      </svg>

                      Foto

                    </label>

                    <input type="file" name="foto" id="archivo" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" />

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

              <button type="submit" name="publicar" class="btn shadow" id="btnn">Publicar</button>

            </div>

          </div>

        </form>

      </div>

    </div>

  </div>

  <br>

  <!-- subida a la base de datos -->

  <?php
  if (isset($_POST['publicar'])) {

    $publicacion = mysqli_real_escape_string($mysqli, $_POST['publicacion']);
    $result = mysqli_query($mysqli, "SHOW TABLE STATUS WHERE `Name` = 'post'");
    $data = mysqli_fetch_assoc($result);
    $next_increment = $data['Auto_increment'];

    $alea = substr(strtoupper(md5(microtime(true))), 0, 12);
    $code = $next_increment . $alea;
    if ($_SESSION['id_rol'] == 1) {
      $rfoto = $_FILES['foto']['tmp_name'];
      $formatos_permitidos =  array('mp4', 'mov', 'wmv', 'avi', ' ');
      $archivo = $_FILES['foto']['name'];
      $extension = pathinfo($archivo, PATHINFO_EXTENSION);
    } else if ($_SESSION['id_rol'] == 2) {
      $rfoto = $_FILES['foto']['tmp_name'];
      $formatos_permitidos =  array('jpg', 'bmp', 'gif', 'tif', 'png', 'jpeg');
      $archivo = $_FILES['foto']['name'];
      $extension = pathinfo($archivo, PATHINFO_EXTENSION);
    }
    if (!in_array($extension, $formatos_permitidos)) {
      if ($_SESSION['id_rol'] == 1) {
        echo  "<script>
        
          alert('Error formato no permitido !!') 
          
          alert('Recuerde Siempre subir un video!!') 
          </script>";
      } else if ($_SESSION['id_rol'] == 2) {
        echo  "<script>
        
            alert('Error formato no permitido !!') 
            
            alert('Recuerde Siempre subir una foto!!') 
            </script>";
      }
    } else {

      if (is_uploaded_file($rfoto)) {

        $type = $extension;
        $name = $code . "." . $type;
        $destino = "../vista/publicaciones/" . $name;
        $nombre = $name;
        copy($rfoto, $destino);

        /* 
          
          $llamar = mysql_num_rows(mysql_query("SELECT * FROM albumes WHERE usuario ='".$_SESSION['id']."' AND nombre = 'Publicaciones'"));

          if($llamar >= 1) {} else {
            
            $crearalbum = mysql_query("INSERT INTO albumes (usuario,fecha,nombre) values ('".$_SESSION['id']."',now(),'Publicaciones')");

          }

          $idalbum = mysql_query("SELECT * FROM albumes WHERE usuario ='".$_SESSION['id']."' AND nombre = 'Publicaciones'");
          $alb = mysql_fetch_array($idalbum);

          $subirimg = mysql_query("INSERT INTO fotos (usuario,fecha,ruta,album,publicacion) values ('".$_SESSION['id']."',now(),'$nombre','".$alb['id_alb']."','$next_increment')");

          $llamadoimg = mysql_query("SELECT id_fot FROM fotos WHERE usuario = '".$_SESSION['id']."' ORDER BY id_fot desc");
          $llaim = mysql_fetch_array($llamadoimg);
          
          */
      } else {
        $nombre = '';
      }

      $subir = mysqli_query(

        $mysqli,
        "INSERT INTO post (id_user,fecha,contenido,post,comentarios) 
          values ('" . $_SESSION['id_user'] . "',now(),'$publicacion','$nombre','1')"
      );

      if ($subir) {
        echo '<script>window.location="../vista/profile_ent.php"</script>';
      }
    }
  }

  ?>