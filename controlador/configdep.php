<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['email']) {
	header("Location:index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Hunter|Perfil Deportista</title>
    <link rel="shortcut icon" href="..\vista\img\talent_hunter7-removebg-preview.png">
</head>  
    <?php
        include("../modelo/connect_db.php");
        $query="SELECT * from user where id_user=$_SESSION[id_user] ";
        $resultado=$mysqli->query($query);
        while ($row=$resultado->fetch_assoc()){
    ?>
    <img height="100px" src="data:Image/png;base64,<?php echo base64_encode($row['profile_foto']); ?>"/><br>  
    <h2><?php echo $row['name']; ?></h2>
    <h5><?php echo $row['email']; ?></h5>
    <h5?><?php echo $row['pais']; ?></h5>    
    <h5><?php echo $row['region']; ?></h5>
    <h5><?php echo $row['position']; ?></h5>
    <h5><?php echo $row['description']; ?></h5>
    
    <?php
        }
    ?>
     
     <a href="../modelo/desconectar.php"><input type="button" name="logout" value="Logout" /></a>
</body>
</html>