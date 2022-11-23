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
    <title>Talent Hunter|Entidad</title>
    <link rel="shortcut icon" href="..\vista\img\talent_hunter7-removebg-preview.png">
    <link rel="stylesheet" href="css/estiloproent.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src:"../js/jquery.jscroll.js"></script>
    <style>
      .scroll{
        width:100%;
      }

      .scroll .jscroll-loading {
        width:10%;
        margin: -500px auto;

      }

  
    </style>
    </head>
<body>

<!--conexion a la base de datos -->

  
<!-- codigo scroll -->
<div class="scroll">
    <?php require_once '../controlador/newpost.php'; 
    ?>
  </div>
  <!-- codigo scroll -->
  <div class="scroll">
    <?php require_once '../controlador/publicaciones.php'; 
    ?>
  </div>
    
  <script>
    
  //Simple codigo para hacer la paginacion scroll
    
  $(document).ready(function() {
      
    $('.scroll').jscroll({
        
      loadingHtml: '<img src="images/invisible.png" alt="Loading" />'
      
    });
    
  });
    
  </script>

<script type="text/javascript">
            let archivo = document.querySelector('#archivo');
            archivo.addEventListener('change',() => {
              document.querySelector('#nombres').innerText = archivo.files[0].name;
            });

</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

      
    
</body>
</html>