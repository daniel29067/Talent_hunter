
<!-- Consulta registro en la base de datos -->

<?php

include("../modelo/connect_db.php");
$CantidadMostrar=5;

  // Validado  la variable GET
$compag=(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
$TotalReg=mysqli_query($mysqli,"SELECT * FROM post ");
$totalr = mysqli_num_rows($TotalReg);

  //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
$TotalRegistro  =ceil($totalr/$CantidadMostrar);

  //Operacion matematica para mostrar los siquientes datos.
$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):0;

  //Consulta SQL
$consultavistas ="SELECT * FROM post ORDER BY id_pub DESC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
$consulta=mysqli_query($mysqli,$consultavistas);

/* Inicio del while de los registros en la base de datos */

while ($lista=mysqli_fetch_array($consulta)) {

  $userid = mysqli_real_escape_string($mysqli,$lista['id_user']);

  $usuariob = mysqli_query($mysqli,"SELECT * FROM user WHERE id_user = '$userid'");
  $use = mysqli_fetch_array($usuariob);

 /* $fotos = mysqli_query($mysqli,"SELECT * FROM post WHERE id_pub = '$lista[id_pub]'");
  $fot = mysqli_fetch_array($fotos);*/

?>



<link rel="stylesheet" href="../vista/css/estilop.css">

<!-- Diseño y Publicaciones -->

<div class="container bg-white">

  <div class="row mt-3 mx-2 justify-content-center">

    <div class="col-lg-6 border border-2 rounded">

     <!-- Encabezado -->

      <div class="row p-2 align-items-center rounded-bottom border-bottom border-3 rounded" id="enca">

      <!-- foto usuario -->

        <div class="col-md-6">

          <img id="fotoo" src="../vista/img/profile_photos/<?php echo $use['profile_foto']; ?>" alt="User Image">
  
          <?php 
    
          if($_SESSION['id_rol']==1){ 
  
          ?>

          &nbsp;
  
          <span class="description" style="cursor:pointer;" id="nombre"><?php echo "<b>".$use['name']."</b>";?></span>
  
          <?php
  
          }elseif($_SESSION['id_rol']==2) { 
      
          ?>

          <span class="description" onclick="location.href='perfil.php?id=<?php echo $use['id_user'];?>';">

            <?php echo "<b>".$use['name']."</b>";?>

            <?php 

            }
  
            ?>

          </span>

        </div>

        <!-- nombre usuario -->

        <div class="col-md-6">


        </div>
      
      </div>
      
      <!-- Cuerpo -->
      
      <div class="row m-2">
        
        <?php 
        
        if($_SESSION['id_rol']==1)
        {
          if($lista['post'] != 0)
          
          {
            
            $info=new SplFileInfo($lista['post']);
            $info2= $info->getExtension();
    
            if($info2=='mp4'||$info2=='mov' ||$info2=='wmv'||$info2=='avi')
            {
            ?>

          <video width="100%" height="100%" controls>
            <source src="../vista/publicaciones/<?php echo $lista['post'];?>">
          </video>

          <?php

          }else

          {
        
          ?>
          <img src="../vista/publicaciones/<?php echo $lista['post'];?>" width="100%">
          <?php
          
          }
          }
        }elseif($_SESSION['id_rol']==2)
        
        {
          if($lista['post'] != 0)
          
          {

          $info=new SplFileInfo($lista['post']);
          $info2= $info->getExtension();

          if($info2=='mp4'||$info2=='mov' ||$info2=='wmv'||$info2=='avi')
          {
            ?>
            
            <video width="100%" height="100%" controls>
              <source src="../vista/publicaciones/<?php echo $lista['post'];?>">
            </video>

            <?php
          
          }else
          {
            ?>
              <img src="../vista/publicaciones/<?php echo $lista['post'];?>" width="100%">
            <?php
          }
        }
    }
    
    ?>

    <div class="row pt-3">

      <div class="col">
        <?php 
        echo $lista['contenido'];
        ?>
      </div>
     
    </div>

</div>

<!--footer -->

<div class="row p-0 align-items-center justify-content-center rounded-bottom border-top border-3 text-end" id="pie">

<span class="description"><?php echo $lista['fecha'];?></span>

</div>

</div>

<!-- Final Diseño y publicaciones -->

    </div>

  </div>

<?php

}

//Validmos el incrementador par que no genere error
//de consulta.  

if($IncrimentNum<=0){}else {
echo "<a href=\"publicaciones.php?pag=".$IncrimentNum."\">Seguiente</a>";
}

?>


  