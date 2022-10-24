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
<script>
    function Confirmlogout() {
        var resp = confirm("¿Desea Cerrar la sesion?");
        if (resp == true){
            return true;
        }
        else {
            location.href='../vista/profile_ent.php'
             return false;
        }

    }
</script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Config Entidad</title>
    <link rel="shortcut icon" href="..\vista\img\talent_hunter7-removebg-preview.png">
</head> 
<body>
<a href="../controlador/actualizarent.php"><input type="button" name="actualizarent" value="Editar" /></a>
    <?php
        include("../modelo/connect_db.php");
        $query="SELECT user.id_user,user.name,user.email,user.passwd,pais.name_pais,user.region,user.deporte,user.profile_foto,user.description from user JOIN pais where user.id_user=$_SESSION[id_user] AND pais.id_pais=$_SESSION[pais]";
        $resultado=$mysqli->query($query);
        while ($row=$resultado->fetch_assoc()){
    ?>
   <img height="100px" src="../vista/img/profile_photos/<?php echo $_SESSION['profile_foto']; ?>"/><br> 
    <h2><?php echo $row['name']; ?></h2>
    <h5><?php echo $row['id_user']; ?></h5>
    <h5><?php echo $row['email']; ?></h5>
    <h5?><?php echo $row['name_pais']; ?></h5>    
    <h5><?php echo $row['region']; ?></h5>
    <h5><?php echo $row['description']; ?></h5>
    
    <?php
        }
    ?>
    <a href="../vista/eliminarent.php"><input type="button" name="delete" value="Eliminar cuenta" /></a>
     <a href="../modelo/desconectar.php"><input type="button" name="logout" value="Logout" onclick="return Confirmlogout()"/></a>
</body>
</html>