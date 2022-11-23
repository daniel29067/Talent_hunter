<!-- subida a la base de datos -->
<?php
        include("../modelo/connect_db.php");

    $foto=$_POST['foto'];
    $post=$_POST['publicacion'];
      
      $publicacion = mysqli_real_escape_string($mysqli, $post);
      $result = mysqli_query($mysqli,"SHOW TABLE STATUS WHERE `Name` = 'post'");
      $data = mysqli_fetch_assoc($result);
      $next_increment = $data['Auto_increment'];

      $alea = substr(strtoupper(md5(microtime(true))), 0,12);
      $code = $next_increment.$alea;
      
        $rfoto = $_FILES[$foto]['tmp_name'];
        $formatos_permitidos =  array('pdf');
        $archivo = $_FILES[$foto]['name'];
        $extension = pathinfo($archivo, PATHINFO_EXTENSION);
    
      if(!in_array($extension, $formatos_permitidos) ) {
        if($_SESSION['id_rol']==1){
            echo  "<script>
        
          alert('Error formato no permitido !!') 
          
          alert('Recuerde Siempre subir el contrato en pdf!!') 
          </script>";
        }
        else if($_SESSION['id_rol']==2)  {
            echo  "<script>
        
            alert('Error formato no permitido !!') 
            
            alert('Recuerde Siempre subir una foto!!') 
            </script>";
    
        }
        

      }else{
        
        if(is_uploaded_file($rfoto)){

          $type=$extension;
          $name = $code.".".$type;
          $destino = "../vista/contratos/".$name;
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
                    
        }else{
          $nombre = '';
        }
        
        $subir = mysqli_query(
          
          $mysqli,"INSERT INTO post (id_user,fecha,contenido,post,comentarios) 
          values ('".$_SESSION['id_user']."',now(),'$publicacion','$nombre','1')");
          
          if($subir) {echo '<script>window.location="../vista/contratos.php"</script>';
          
          }
      }    
     
    
  ?>