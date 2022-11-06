<?php
include("../modelo/connect_db.php");
?>
<script>
    function Confirmdelete() {
        var resp = confirm("¿Desea eliminar su post?");
       
            if (resp == true) {

                return true;
            } else {
                return false;
            }
        
    }
</script>
<?php
$CantidadMostrar=5;
$aid = mysqli_real_escape_string($mysqli,$_SESSION['id_user']);
     // Validado  la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
  $TotalReg       =mysqli_query($mysqli,"SELECT * FROM post WHERE id_user = '$aid'");
  $totalr = mysqli_num_rows($TotalReg);
  //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
  $TotalRegistro  =ceil($totalr/$CantidadMostrar);
   //Operacion matematica para mostrar los siquientes datos.
  $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):0;
  //Consulta SQL
  $consultavistas ="SELECT *
        FROM
        post WHERE id_user = '$aid'
        ORDER BY
        id_pub DESC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
  $consulta=mysqli_query($mysqli,$consultavistas);
  while ($lista=mysqli_fetch_array($consulta)) {

    $userid = mysqli_real_escape_string($mysqli,$lista['id_user']);

    $usuariob = mysqli_query($mysqli,"SELECT * FROM user WHERE id_user = '$userid'");
    $use = mysqli_fetch_array($usuariob);

   /* $fotos = mysql_query("SELECT * FROM fotos WHERE publicacion = '$lista[id_pub]'");
    $fot = mysql_fetch_array($fotos);*/
  ?>

  <link rel="stylesheet" href="../vista/css/estiloactividadp.css">

  <div class="container-fluid bg-white">

    <div class="row justify-content-center">

      <div class="col-lg-9 border border-3 rounded shadow p-0 m-3">

        <div class="row-fluid text-end p-0">

          <button type="button" data-bs-toggle="dropdown" style="text-decoration:none; background:none; border:none;">
                        
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
              <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
            </svg>
              
          </button>
                                      
          <ul class="dropdown-menu text-center">

            <li id="op">
              <a class="btn " href="../controlador/actualizarpost.php" name="actualizarpost" value="Editar" id="btnn">Editar</a>
            </li>
                                          
            <li id="op">
              <a class="btn" href="../modelo/eliminarpost.php" name="deletepost" value="Eliminar" id="btnn">Eliminar</a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <li id="fecha"><?php echo $lista['fecha'];?></li>
              
          </ul>

        </div>

        <div class="row-fluid border-top border-2 mt-1">
          <!-- post text -->
        
          <?php 
          if($_SESSION['id_rol']==1){
          if($lista['post'] != 0)
          {
          $info=new SplFileInfo($lista['post']);
          $info2= $info->getExtension();
          if($info2=='mp4'||$info2=='mov' ||$info2=='wmv'||$info2=='avi'){

          ?>
          <video width="100%" height="100%" controls>
	          <source src="../vista/publicaciones/<?php echo $lista['post'];?>">
		      </video>
          <?php
          }
          else{?>

          <img src="../vista/publicaciones/<?php echo $lista['post'];?>">

          <?php
          }
          }
          }
          elseif($_SESSION['id_rol']==2){
          if($lista['post'] != 0)
          {
          $info=new SplFileInfo($lista['post']);
          $info2= $info->getExtension();
          if($info2=='mp4'||$info2=='mov' ||$info2=='wmv'||$info2=='avi'){

          ?>
          <video width="100%" height="100%" controls>
		        <source src="../vista/publicaciones/<?php echo $lista['post'];?>">
		      </video>
          <?php
          }
          else{?>
          <img src="../vista/publicaciones/<?php echo $lista['post'];?>" width="100%">
          <?php
          }
          }
          }
          ?>
        </div>

      </div>

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