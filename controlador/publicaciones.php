
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
	while ($lista=mysqli_fetch_array($consulta)) {

		$userid = mysqli_real_escape_string($mysqli,$lista['id_user']);

		$usuariob = mysqli_query($mysqli,"SELECT * FROM user WHERE id_user = '$userid'");
    $use = mysqli_fetch_array($usuariob);

   /* $fotos = mysqli_query($mysqli,"SELECT * FROM post WHERE id_pub = '$lista[id_pub]'");
    $fot = mysqli_fetch_array($fotos);*/
	?>
		<!-- START PUBLICACIONES -->
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="../vista/img/profile_photos/<?php echo $use['profile_foto']; ?>" alt="User Image">
                <?php 
              if($_SESSION['id_rol']==1){ ?>
                <span class="description" style="cursor:pointer; color: #3C8DBC;""><?php echo $use['name'];?></span>
                <?php
                }
              elseif($_SESSION['id_rol']==2) { ?>
<span class="description" onclick="location.href='perfil.php?id=<?php echo $use['id_user'];?>';" style="cursor:pointer; color: #3C8DBC;""><?php echo $use['name'];?></span>
<?php }?>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
             

              <?php 
              if($_SESSION['id_rol']==1){
              if($lista['post'] != 0)
              {
                $info=new SplFileInfo($lista['post']);
                $info2= $info->getExtension();
                if($info2=='mp4'||$info2=='mov' ||$info2=='wmv'||$info2=='avi'){

              ?>
              <video width="100%" height="240" controls>
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
            elseif($_SESSION['id_rol']==2){
              if($lista['post'] != 0)
              {
                $info=new SplFileInfo($lista['post']);
                $info2= $info->getExtension();
                if($info2=='mp4'||$info2=='mov' ||$info2=='wmv'||$info2=='avi'){

              ?>
              <form action="../modelo/eliminarpost.php" method="post">
               <video width="100%" height="240" controls>
					    <source src="../vista/publicaciones/<?php echo $lista['post'];?>">
				      </video>
            
                <input type="submit" name="delete" value="Delete" onclick="return Confirmdelete()" />
            
    </form>
              <?php
                }
                else{?>
                <img src="../vista/publicaciones/<?php echo $lista['post'];?>" width="100%">
                <?php
                }
          	  }
            }
?>
 <p><?php echo $lista['contenido'];?></p>
<span class="description"><?php echo $lista['fecha'];?></span>

              <br><br>
              
        <!-- /.col -->
        <!-- END PUBLICACIONES -->
    
    <br><br>

	<?php
	}
	//Validmos el incrementador par que no genere error
	//de consulta.  
    if($IncrimentNum<=0){}else {
	echo "<a href=\"publicaciones.php?pag=".$IncrimentNum."\">Seguiente</a>";
	}
?>