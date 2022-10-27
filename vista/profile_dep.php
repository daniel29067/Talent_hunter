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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Deportista</title>
    <link rel="shortcut icon" href="..\vista\img\talent_hunter7-removebg-preview.png">
    <link rel="stylesheet" href="../vista/css/estiloprodep.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src:"../js/jquery.jscroll.js"></script>
        <style>
            .scroll {
                width: 100%;
            }

            .scroll .jscroll-loading {
                width: 10%;
                margin: -500px auto;

            }
        </style>
    </head>
</head>
<body>

<nav class="navbar bg-light fixed-top">
  <div class="container-fluid">
    
    <a class="navbar-brand" href="">Talent Hunter</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>

<nav class="navbar navbar-expand-md bg-light ">

    <div class="container-fluid px-2" id="enca">

      <?php
      include("../modelo/connect_db.php");
      $query="SELECT * from user where id_user=$_SESSION[id_user]";
      $resultado=$mysqli->query($query);
      while ($row=$resultado->fetch_assoc()){
      ?> 

      <!-- boton configuracion -->

      <a class="navbar-brand ms-auto" href="../vista/perfilpriv.php?id=<?php echo $_S['id_user'];?>';">
        <!--<img height="100px" src="data:Image/png;base64,<?php echo base64_encode($row['profile_foto']); ?>"/>   --->
        <img height="30px" class="rounded-circle" src="../vista/img/profile_photos/<?php echo $_SESSION['profile_foto']; ?>"/>&nbsp; <?php echo $row['name']; ?>
      </a>

</div>

    </nav>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    
    
    
    <h5><?php echo $row['description']; ?></h5>
    <?php
        }
    ?> 
    
         <!-- CAJA PUBLICACIONES -->
         <div class="col-md-12">              
              <div class="box box-primary direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Nueva publicación</h3>

                 
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                      <i class="fa fa-minus"></i>
                    </button>
              </div>

              <!-- /.box-body -->
                <div class="box-footer">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                      <textarea name="publicacion" onkeypress="return validarn(event)" placeholder="Nueva publicación" class="form-control" cols="200" rows="3" required></textarea>
                      <br><br><br><br>

                    <!-- START Input file nuevo diseño .-->
                      <input type="file" name="foto" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected"/>
                      <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Sube una foto</span></label>
                    <!-- END Input file nuevo diseño .-->
                    <br>

                      <button type="submit" name="publicar" class="btn btn-primary btn-flat">Publicar</button>
                    </div>
                  </form>
                  <?php
                  if(isset($_POST['publicar'])) 
                  {
                    $publicacion = mysqli_real_escape_string($mysqli,$_POST['publicacion']);
                    $result = mysqli_query($mysqli,"SHOW TABLE STATUS WHERE `Name` = 'post'");
                    $data = mysqli_fetch_assoc($result);
                    $next_increment = $data['Auto_increment'];

                    $alea = substr(strtoupper(md5(microtime(true))), 0,12);
                    $code = $next_increment.$alea;

                    
                    $rfoto = $_FILES['foto']['tmp_name'];
                    $formatos_permitidos =  array('mp4','mov' ,'wmv','avi',' ');
                    $archivo = $_FILES['foto']['name'];
                    $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                    if(!in_array($extension, $formatos_permitidos) ) {
                        echo  "<script>
                        alert('Error formato no permitido !!') 
                        
                        alert('Recuerde Siempre subir un video!!') 
                       </script>";
                      }
                      else{
                      
                                          if(is_uploaded_file($rfoto))
                                          {
                                          $type=$extension;
                                            $name = $code.".".$type;
                      $destino = "../vista/publicaciones/".$name;
                      $nombre = $name;
                      copy($rfoto, $destino);
                    

                   /* $llamar = mysql_num_rows(mysql_query("SELECT * FROM albumes WHERE usuario ='".$_SESSION['id']."' AND nombre = 'Publicaciones'"));

                    if($llamar >= 1) {} else {

                  $crearalbum = mysql_query("INSERT INTO albumes (usuario,fecha,nombre) values ('".$_SESSION['id']."',now(),'Publicaciones')");

                   }

                   $idalbum = mysql_query("SELECT * FROM albumes WHERE usuario ='".$_SESSION['id']."' AND nombre = 'Publicaciones'");
                   $alb = mysql_fetch_array($idalbum);

                    $subirimg = mysql_query("INSERT INTO fotos (usuario,fecha,ruta,album,publicacion) values ('".$_SESSION['id']."',now(),'$nombre','".$alb['id_alb']."','$next_increment')");

                    $llamadoimg = mysql_query("SELECT id_fot FROM fotos WHERE usuario = '".$_SESSION['id']."' ORDER BY id_fot desc");
                    $llaim = mysql_fetch_array($llamadoimg);
*/
                    }
                    else
                    {
                      $nombre = '';
                    }

                    $subir = mysqli_query($mysqli,"INSERT INTO post (id_user,fecha,contenido,post,comentarios) values ('".$_SESSION['id_user']."',now(),'$publicacion','$nombre','1')");

                    if($subir) {echo '<script>window.location="../vista/profile_dep.php"</script>';}

                  }    
                }  

                  ?>
                      

                  
                  
               <!-- codigo scroll -->
          <div class="scroll">
            <?php require_once '../controlador/publicaciones.php'; ?>
          </div>

          <script>
            //Simple codigo para hacer la paginacion scroll
            $(document).ready(function() {
              $('.scroll').jscroll({
                loadingHtml: '<img src="images/invisible.png" alt="Loading" />'
            });
            });
            </script>
          <!-- codigo scroll -->


          </div>

        </div>
       
</body>
</html>