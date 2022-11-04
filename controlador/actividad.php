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

<link rel="stylesheet" href="../vista/css/estiloactividaddd.css">

  <div class="container-fluid bg-white">

    <div class="row-fluid p-3">

      <div class="row justify-content-center">

        <div class="col-lg-4 d-flex justify-content-center align-items-center box-tools">

          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>

        </div>

        <div class="col-lg-12 d-flex justify-content-center align-items-center">

          <div class="row text-center">

            <div class="col-lg-6">
              <a class="btn " href="../controlador/actualizarpost.php" name="actualizarpost" value="Editar" id="btnn">Editar</a>
            </div>

            <div class="col-lg-6">
              <a class="btn" href="../modelo/eliminarpost.php" name="deletepost" value="Eliminar" id="btnn">Eliminar</a>
            </div>

          </div>

        </div>      

    </div>

    <div class="row justify-content-center align-items-center">

      <div class="col-lg-12">

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

    <div class="row justify-content-center align-items-center">

      <div class="col-lg-12">

        <p><?php echo $lista['contenido'];?></p>

      </div>

    </div>

    <div class="row justify-content-end p-2 border-3 border-top rounded-bottom" id="pie">

        <?php echo $lista['fecha'];?>
      
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