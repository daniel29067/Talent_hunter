<?php
include("../modelo/connect_db.php");
?>
<script>
    function Confirmdelete() {
        var resp = confirm("¿Desea eliminar el contrato?");
       
            if (resp == true) {

                return true;
            } else {
                return false;
            }
        
    }
</script>
<link rel="stylesheet" href="../vista/css/estilop.css">
<?php
$CantidadMostrar=5;
$aid = mysqli_real_escape_string($mysqli,$_SESSION['id_user']);
     // Validado  la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
    if($_SESSION['id_rol']==2){
  $TotalReg       =mysqli_query($mysqli,"SELECT * FROM  contratos WHERE id_ent = '$aid'");}
  else if($_SESSION['id_rol']==1){
    $TotalReg       =mysqli_query($mysqli,"SELECT * FROM  contratos WHERE id_dep = '$aid'");}

  $totalr = mysqli_num_rows($TotalReg);
  //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
  $TotalRegistro  =ceil($totalr/$CantidadMostrar);
   //Operacion matematica para mostrar los siquientes datos.
  $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):0;
  //Consulta SQL
  if($_SESSION['id_rol']==2){
    $consultavistas ="SELECT *
    FROM
    contratos WHERE id_ent = '$aid'
    ORDER BY
    id_contrato DESC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;}
    else if($_SESSION['id_rol']==1){
      $consultavistas ="SELECT *
      FROM
      contratos WHERE id_dep = '$aid'
      ORDER BY
      id_contrato DESC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;}
  
  $consulta=mysqli_query($mysqli,$consultavistas);
  while ($lista=mysqli_fetch_array($consulta)) {
    if($_SESSION['id_rol']==2){
      $userid = mysqli_real_escape_string($mysqli,$lista['id_ent']);}
      else if($_SESSION['id_rol']==1){
        $userid = mysqli_real_escape_string($mysqli,$lista['id_dep']);}

    

    $usuariob = mysqli_query($mysqli,"SELECT * FROM user WHERE id_user = '$userid'");
    $use = mysqli_fetch_array($usuariob);

   /* $fotos = mysql_query("SELECT * FROM fotos WHERE publicacion = '$lista[id_pub]'");
    $fot = mysql_fetch_array($fotos);*/
  ?>

  <link rel="stylesheet" href="../vista/css/estiloactividadp.css">

  
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
  
          <span class="description" style="cursor: pointer;" id="nombre"><?php echo "<b>".$use['name']."</b>";?></span>
  
          <?php
  
          }elseif($_SESSION['id_rol']==2) { 
      
          ?>

            <span class="description" style="cursor: pointer;" id="nombre"><?php echo "<b>".$use['name']."</b>";?></span>

            <?php 

            }
  
            ?>

          </span>
          <?php
          if($_SESSION['id_rol']==2){?>
          <button type="button" data-bs-toggle="dropdown" style="text-decoration:none; background:none; border:none;">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                          <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg>
                          
                      </button>
                                                  
                      <ul class="dropdown-menu text-center">
            
                                                      
                        <li id="op">
            
                          <a class="btn" href="../modelo/eliminarcontrato.php?idcontrato=<?php echo $lista['id_contrato'] ?>&iddep=<?php echo $lista['id_dep'] ?>" name="deletepost" value="Eliminar" id="btnn" onclick="return Confirmdelete()" >Eliminar</a>
                        </li>
            
                        <li><hr class="dropdown-divider"></li>
            
                          
                      </ul>
                    <?php }
                      ?>
        </div>

        <!-- nombre usuario -->

        <div class="col-md-6">


        </div>
      
      </div>
      
      <!-- Cuerpo -->
      
      <div class="row m-2">
        
        <?php 
            
        if($lista['documento'] != 0)
        {
        $info=new SplFileInfo($lista['documento']);
        $info2= $info->getExtension();
        if($info2=='pdf'){

        ?>
         <embed src="../vista/Contratos/<?php echo $lista['documento']?>" type="application/pdf" width="100%" height="200%" />
        </video>
        <?php }
      }?>
    <div class="row pt-3">

      <div class="col">
      <span class="description">Entidad:
        <?php 
         $lista1=mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM user WHERE id_user= $lista[id_ent]"));
        echo $lista['id_ent'];
        ?> </span>
        <br>
         <span class="description">Nombre Entidad:
        <?php 
        echo $lista1['name'];
        ?> </span>
      
      </div>
      <div class="col">
      <span class="description">Deportista:
        <?php 
        $lista2=mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM user WHERE id_user= $lista[id_dep]"));
        echo $lista['id_dep'];
        ?> </span>
        <br>
        <span class="description">Nombre Deportista:
        <?php 
        echo $lista2['name'];
        ?> </span>
      
      </div>
      
     
    </div>

</div>

<!--footer -->

<div class="row p-0 align-items-center justify-content-center rounded-bottom border-top border-3 text-end" id="pie">

<span class="description">fecha inicio: <?php echo $lista['fecha_inicio'];?></span>
<span class="description">fecha Final: <?php echo $lista['fecha_fin'];?></span>
</div>

</div>

<!-- Final Diseño y publicaciones -->

	<?php
	}
	//Validmos el incrementador par que no genere error
	//de consulta.  
    if($IncrimentNum<=0){}else {
	echo "<a href=\"publicaciones.php?pag=".$IncrimentNum."\">Seguiente</a>";
	}
?>